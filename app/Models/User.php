<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject, HasMedia
{
    use HasFactory, SoftDeletes, Notifiable, HasRoles;
    use HasMediaTrait;
    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    public function getJWTCustomClaims(): array
    {
        return [];
    }

    protected $fillable = [
        'type',
        'name',
        'phone',
        'phone_verified_at',
        'password',
        'city_id',
        'image',
        'location',
        'nationality',
        'email',
        'email_verified_at',
        'marketer_id',
        'banned',
        'device',
        'last_login_at',
        'last_ip',
        'approved',
        'reject_reason',
        'approved_at'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'phone_verified_at' => 'datetime',
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'device' => 'json',
        'location' => 'json',
    ];

    protected $dates = [
        'deleted_at'
    ];


    protected function getIsCompletedProfileAttribute(): bool
    {
        if ($this->attributes['last_login_at']) {
            return true;
        }
        return false;
    }

    public function city(): object
    {
        return $this->belongsTo(DropDown::class, 'city_id', 'id');
    }

    public function getTypeString(): string
    {
        if ($this['type'] == 'USER') {
            return 'مستخدم';
        } elseif ($this['type'] == 'PROVIDER') {
            return 'مقدم خدمة';
        } else {
            return '';
        }
    }
    protected function setPasswordAttribute($password)
    {
        if (isset($password)) {
            $this->attributes['password'] = bcrypt($password);
        }
    }

    protected function getImageAttribute()
    {
        $file = $this->getMedia("avatars")->first();
        if ($file) {
            return $this->getMedia("avatars")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        FileService::upload($image, $this, "avatars", true);
    }
}

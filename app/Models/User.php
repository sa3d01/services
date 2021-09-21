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

    public function rates():object
    {
        return $this->hasMany(Rate::class,'rated_id','id');
    }
    public function products():object
    {
        return $this->hasMany(Product::class,'user_id','id');
    }
    public function galleries():object
    {
        return $this->hasMany(Gallery::class,'user_id','id');
    }
    public function feedbacks(){
        $feedbacks=[];
        foreach ($this->rates as $rate){
            $arr['rate']=$rate->rate;
            $arr['feedback']=$rate->feedback;
            $arr['user']['id']=$rate->user->id;
            $arr['user']['name']=$rate->user->name;
            $arr['user']['image']=$rate->user->image;
            $feedbacks[]=$arr;
        }
        return $feedbacks;
    }
    public function averageRate()
    {
        if ($this->rates()->count('rate') < 1){
            return 0;
        }
        return round($this->rates()->sum('rate')/$this->rates()->count('rate'));
    }
    public function socials()
    {
        return $this->hasMany(Social::class,'user_id','id');
    }
}

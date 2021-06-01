<?php

namespace App\Models;

use App\Traits\ModelBaseFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use phpDocumentor\Reflection\Types\Object_;
use Spatie\Permission\Traits\HasRoles;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, SoftDeletes, Notifiable, HasRoles , ModelBaseFunctions;

    private $route='user';
    private $images_link='media/images/user/';
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims():array
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
        'location',
        'country_id',
        'image',
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

    public function city():object
    {
        return $this->belongsTo(DropDown::class,'city_id','id');
    }
    public function country():object
    {
        return $this->belongsTo(DropDown::class,'country_id','id');
    }
    public function getTypeString():string
    {
        if ($this['type']=='USER'){
            return 'مستخدم';
        }elseif ($this['type']=='PROVIDER'){
            return 'مقدم خدمة';
        }else{
            return '';
        }
    }

    protected function getImageAttribute():string
    {
        $dest = $this->images_link;
        try {
            if ($this->attributes['image'])
                return asset($dest) . '/' . $this->attributes['image'];
            return asset('media/images/default.jpeg');
        } catch (\Exception $e) {
            return asset('media/images/default.jpeg');
        }
    }
}

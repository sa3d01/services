<?php

namespace App\Models;

use App\Traits\ModelBaseFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PackageUser extends Model
{
    use HasFactory,ModelBaseFunctions;
    private $route='package_user';
    private $images_link='media/images/package_user/';
    protected $fillable = [
        'user_id',
        'package_id',
        'amount',
        'discount',
        'image',
        'status',
    ];
    public function user():object
    {
        return $this->belongsTo(User::class);
    }
    public function package():object
    {
        return $this->belongsTo(Package::class);
    }
}

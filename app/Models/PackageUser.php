<?php

namespace App\Models;

use App\Services\FileService;
use App\Traits\ModelBaseFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class PackageUser extends Model implements HasMedia
{
    use HasFactory;
    use HasMediaTrait;

    public function registerMediaConversions($media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(368)
            ->height(232)
            ->sharpen(10);
    }

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
    protected function getImageAttribute()
    {
        $file = $this->getMedia("subscribes")->first();
        if ($file) {
            return $this->getMedia("subscribes")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        $this->clearMediaCollection("subscribes");
        $fileName = time() . Str::random(10);
        $fileNameWithExt = time() . Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->addMedia($image)
            ->usingFileName($fileNameWithExt)
            ->usingName($fileName)
            ->toMediaCollection("subscribes");
//        FileService::upload($image, $this, "subscribes", true);
    }
}

<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Bank extends Model implements HasMedia
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
    protected $fillable = ['logo', 'name', 'account_number', 'banned'];


    protected function getLogoAttribute()
    {
        $file = $this->getMedia("logos")->first();
        if ($file) {
            return $this->getMedia("logos")->first()->getFullUrl('thumb');
        }
        return asset('media/images/logo.jpeg');
    }

    protected function setLogoAttribute($logo)
    {
        FileService::upload($logo, $this, "logos", true);
    }
}

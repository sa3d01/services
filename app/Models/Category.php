<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Category extends Model implements HasMedia
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
        'banned',
        'name_ar',
        'name_en',
        'image',
        'parent_id',
    ];

    public function parent(): object
    {
        return $this->belongsTo(Category::class, 'parent_id', 'id');
    }

    protected function getImageAttribute()
    {
        $file = $this->getMedia("categories")->first();
        if ($file) {
            return $this->getMedia("categories")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        FileService::upload($image, $this, "categories", true);
    }
}

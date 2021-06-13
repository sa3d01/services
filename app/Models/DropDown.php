<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class DropDown extends Model implements HasMedia
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
        'class',
        'status',
        'name_ar',
        'name_en',
        'image',
        'parent_id',
    ];

    public function parent(): object
    {
        return $this->belongsTo(DropDown::class, 'parent_id', 'id');
    }

    protected function getImageAttribute()
    {
        $file = $this->getMedia("drop_downs")->first();
        if ($file) {
            return $this->getMedia("drop_downs")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        FileService::upload($image, $this, "drop_downs", true);
    }
}

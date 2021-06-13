<?php

namespace App\Models;

use App\Services\FileService;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Slider extends Model implements HasMedia
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
        'type',
        'status',
        'start_date',
        'end_date',
        'title_ar',
        'title_en',
        'note_ar',
        'note_en',
        'image',
        'link',
    ];
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    protected function getImageAttribute()
    {
        $file = $this->getMedia("sliders")->first();
        if ($file) {
            return $this->getMedia("sliders")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        FileService::upload($image, $this, "sliders", true);
    }

}

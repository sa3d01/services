<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia\HasMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;

class Transfer extends Model implements HasMedia
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
        'amount',
        'image',
        'status',
    ];
    public function user():object
    {
        return $this->belongsTo(User::class);
    }
    protected function getImageAttribute()
    {
        $file = $this->getMedia("transfers")->first();
        if ($file) {
            return $this->getMedia("transfers")->first()->getFullUrl('thumb');
        }
        return asset('media/images/default.jpeg');
    }

    protected function setImageAttribute($image)
    {
        $this->clearMediaCollection("transfers");
        $fileName = time() . Str::random(10);
        $fileNameWithExt = time() . Str::random(10) . '.' . $image->getClientOriginalExtension();
        $this->addMedia($image)
            ->usingFileName($fileNameWithExt)
            ->usingName($fileName)
            ->toMediaCollection("transfers");
    }
}

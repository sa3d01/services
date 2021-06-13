<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Slider extends Model
{
    use HasFactory;
    private $images_link='media/images/slider/';
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
    private function upload_file($file)
    {
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();
        $file->move($this->images_link, $filename);
        return $filename;
    }

    function deleteFileFromServer($filePath)
    {
        if ($filePath != null) {
            if (file_exists($filePath)) {
                unlink($filePath);
            }
        }
    }

    protected function setImageAttribute()
    {
        $image = request('image');
        $filename = null;
        if (is_file($image)) {
            $filename = $this->upload_file($image);
        } elseif (filter_var($image, FILTER_VALIDATE_URL) === True) {
            $filename = $image;
        }
        $this->attributes['image'] = $filename;
    }

    protected function getImageAttribute()
    {
        $dest = $this->images_link;
        try {
            if ($this->attributes['image'])
                return asset($dest) . '/' . $this->attributes['image'];
            return asset('media/images/image.jpeg');
        } catch (\Exception $e) {
            return asset('media/images/image.jpeg');
        }
    }

}

<?php

namespace App\Models;

use App\Traits\ModelBaseFunctions;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory,ModelBaseFunctions;
    private $route='gallery';
    private $images_link='media/images/gallery/';
    protected $fillable = [
        'user_id',
        'category_id',
        'image',
        'note',
    ];
    public function user():object
    {
        return $this->belongsTo(User::class);
    }
    public function category():object
    {
        return $this->belongsTo(Category::class);
    }
}

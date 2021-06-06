<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'category_id',
        'price',
        'note',
    ];

    public function user(): object
    {
        return $this->belongsTo(User::class);
    }

    public function category(): object
    {
        return $this->belongsTo(Category::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $fillable = [
        'name',
        'description',
        'price',
        'image',
    ];

    protected $appends = ['image_url']; // <— add this
    public function getImageUrlAttribute()
    {
        return $this->image
            ? asset('storage/' . $this->image)
            : null;
    }
    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}

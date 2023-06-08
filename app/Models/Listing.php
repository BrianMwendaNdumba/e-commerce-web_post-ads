<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Listing extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function favourite()
    {
        return $this->hasMany(Favourite::class);
    }

    public function review()
    {
        return $this->hasMany(Review::class);
    }

    public function county()
    {
        return $this->belongsTo(County::class , 'location');
    }

    protected $fillable = [
        'user_id',
        'category_id',
        'title',
        'slug',
        'condition',
        'mileage',
        'engine',
        'price',
        'location',
        'description',
        'is_negotiable',
    ];
}

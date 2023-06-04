<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
    use HasFactory;

    public function listing()
    {
        return $this->belongsTo(Listing::class);
    }

    protected $fillable = [
        'user_id',
        'listing_id',
    ];
}

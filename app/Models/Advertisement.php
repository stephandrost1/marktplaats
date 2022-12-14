<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    use HasFactory;

    public function categorie()
    {
        return $this->belongsTo(Categorie::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specifications()
    {
        return $this->hasMany(Specification::class);
    }

    public function favorites()
    {
        return $this->hasMany(Favorite::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function bids()
    {
        return $this->hasMany(Bid::class)->orderby('bid', 'desc');
    }
}

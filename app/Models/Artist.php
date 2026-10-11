<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Trip;

class Artist extends Model
{
    protected $fillable = [
        'artist_name', 
        'spotify_id',
        'instagram',
        'youtube'
    ];

    public function trips(): HasMany {
        return $this->hasMany(Trip::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    // need to define the protected fields of data
    protected $fillable = [
        'band_name', 
        'year_founded', 
        'is_active', 
        'description', 
        'number_members', 
        'spotify_url', 
        'apple_music_url', 
        'youtube_url', 
        'instagram_url'
        ]; // array of data field names as strings
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\TripLocation;
use App\Models\Artist;

class Trip extends Model
{
    protected $fillable = [
        'artist_id',
        'name',
    ];

    public function locations(): HasMany {
        return $this->hasMany(TripLocation::class);
    }

    public function artist(): BelongsTo {
        return $this->belongsTo(Artist::class);
    }
}

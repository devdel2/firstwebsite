<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Trip;

class TripLocation extends Model
{
    protected $fillable = [
        'trip_id',
        'location',
        'latitude',
        'longitude',
        'sequence'
    ];

    public function trip(): BelongsTo {
        return $this->belongsTo(Trip::class);
    }
}

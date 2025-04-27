<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Land extends Model
{
    use HasFactory;

    protected $table = 'app.lands';

    protected $fillable = [
        'city',
        'latitude',
        'longitude',
        'land_size'
    ];

    public function farm(): BelongsTo
    {
        return $this->belongsTo(Farm::class);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Model;

class Farm extends Model
{
    use HasFactory;

    protected $table = 'app.farms';

    protected $fillable = [
        'name',
        'palm_count',
        'dates_crop_in_kg'
    ];

    public function factories(): BelongsToMany
    {
        return $this->BelongsToMany(Factory::class, 'app.factory_farm');
    }
}

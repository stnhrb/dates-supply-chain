<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Factory extends Model
{
    use HasFactory;

    protected $table = 'app.factories';

    protected $fillable = [
        'name',
        'city'
    ];

    public function farms(): BelongsToMany
    {
        return $this->BelongsToMany(Farm::class, 'app.factory_farm');
    }
}

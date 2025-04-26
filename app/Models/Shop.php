<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Shop extends Model
{
    use HasFactory;

    protected $table = 'app.shops';

    protected $fillable = [
        'name',
        'city',
        'sales'
    ];

    public function factories(): BelongsToMany
    {
        return $this->BelongsToMany(Factory::class, 'app.factory_shop');
    }
}

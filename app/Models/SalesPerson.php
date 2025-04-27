<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SalesPerson extends Model
{
    use HasFactory;

    protected $table = 'app.sales_persons';

    protected $fillable = [
        'name',
        'gender',
        'phone_number',
        'salary',
    ];

    public function shop(): BelongsTo
    {
        return $this->belongsTo(Shop::class);
    }
}

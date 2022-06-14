<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LowQtyMeasurementScale extends Model
{
    use HasFactory;

    // protected $table = 'measurement_units';
    protected $fillable = [
        'name'
    ];
    public function products()
    {
        return $this->hasMany(Product::class);
    }
}

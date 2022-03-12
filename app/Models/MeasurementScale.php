<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeasurementScale extends Model
{
    use HasFactory;

    // protected $table = 'measurement_units';
    protected $fillable = [
        'identity'
    ];
    public function products()
    {
        //  return $this->hasMany(Product::class, 'measurement_unit_id');
        return $this->hasMany(Product::class);
    }
    
    
    
}

<?php

namespace App\Models;

use App\Models\StoreWarehouse as Store;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Employee extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function StoreWarehouse()
    {
        return $this->belongsTo(StoreWarehouse::class);
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

}

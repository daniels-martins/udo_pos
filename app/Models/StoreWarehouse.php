<?php

namespace App\Models;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StoreWarehouse extends Model
{
    use HasFactory;

    /** 
     * RULES
     * products relationship 
     * the foreign key for 'store_warehouses' table is 'store' instead of 'store_warehouse_id'
     *
     * @return void
     */
    public function products()
    {

         return $this->belongsToMany(Product::class);
        // return $this->hasMany(Product::class)->withDefault();
    }
    
    public function employees()
    {
         return $this->hasMany(Employee::class);
    }
    
    public function user()
    {
         return $this->belongsTo(User::class);
    }
    
    
    
    
        
    
}

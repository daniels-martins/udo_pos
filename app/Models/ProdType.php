<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdType extends Model
{
    use HasFactory;


    public function showTable()
    {
        //  return self::$table;
    }
    
    

    // RULES
    //  * the foreign key for 'prod_types' table is 'prod_type' instead of 'prod_type_id'
    public function __construct(){
    }

    // public function isDefault() : bool
    // {
    //      return $this->id == 7 ;
    // }


    /**
     * products relationship 
     * the foreign key for 'prod_types' table is 'prod_type' instead of 'prod_type_id'
     *
     * @return void
     */
    public function products()
    {

        return $this->hasMany(Product::class);
        return $this->hasMany(Product::class)->withDefault();
    }
    
    
    
    
    
    
    
}

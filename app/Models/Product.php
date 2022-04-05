<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Gloudemans\Shoppingcart\Contracts\Buyable;

class Product extends Model implements Buyable
{
    use HasFactory, SearchableTrait;
    
    // this might be dangerous, i'll work on it when its in production. This works perfectly
    // it automatically obliterates whatever field that is not required in your db and you 
    // could always guard some specific ones using this guarded array
    protected $guarded = ['id'];

    // leave this for now, even if i know i ain't using it. 
    protected $searchable = [
        /**
         * Columns and their priority in search results.
         * Columns with higher values are more important.
         * Columns with equal values have equal importance.
         *
         * @var array
         */
        'columns' => [
            'products.name' => 10,
            'products.desc' => 5,
            // 'products.bio' => 2,
            // 'products.email' => 5,
            // relationships columns
            'products.product_type' => 2,
            // 'products.title' => 2,
            // 'posts.body' => 1,
        ],
        // for relationships
        // 'joins' => [
        //     'posts' => ['users.id', 'posts.user_id'],
        // ],

        // 'joins' => [
        //     'prod_type' => ['prod_type.id', 'products.prod_type_id'],

        // ],
    ];

    // Relationships
    public function measurement_scale()
    {
         return $this->belongsTo(MeasurementScale::class);
    }


    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }


    public function prodType()
    {
        return $this->belongsTo(ProdType::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }


    public function storeWarehouses()
    {
         return $this->belongsToMany(StoreWarehouse::class);
    }
    
    
    

// could be categories i.e manytomanu rel.
    public function category()
    {
        return $this->belongsTo(Category::class);
        // return $this->belongsTo(Category::class)->withDefault([
        //     'zilch' => true
        // ]);

    }



    // interface methods
    public function getBuyableIdentifier($options = null)
    {
        return $this->id;
    }

    public function getBuyableDescription($options = null)
    {
        return $this->name;
    }

    public function getBuyablePrice($options = null)
    {
        return $this->price;
    }

}

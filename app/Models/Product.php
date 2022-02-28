<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory, SearchableTrait;

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

}

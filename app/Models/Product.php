<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

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
            'products.first_name' => 10,
            'products.last_name' => 10,
            'products.bio' => 2,
            'products.email' => 5,
            // relationships columns
            // 'posts.title' => 2,
            // 'posts.body' => 1,
        ],
        // for relationships
        // 'joins' => [
        //     'posts' => ['users.id', 'posts.user_id'],
        // ],
    ];

}

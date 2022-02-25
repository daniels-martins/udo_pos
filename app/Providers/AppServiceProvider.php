<?php

namespace App\Providers;

use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $products = Product::all(['name']);
        $products = Product::pluck('name');
        $all_products = [];
        foreach ($products as $product) {
            $all_products[] = $product;
        }
        $all_products = json_encode($all_products);
        View::share('all_products', $products);
    }
}

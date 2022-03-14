<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProdType;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $all_products = json_encode(array_values(Product::pluck('name')->toArray()));
        $all_products_obj = (Product::all());
        // View::share('all_products', $all_products);
        View::share(compact('all_products', 'all_products_obj'));


        View::composer(['products.edit', 'products.create'], function ($view) {
            $prod_types = ProdType::get(['id', 'name']);
            $measurement_scales = MeasurementScale::all();
            $stores = StoreWarehouse::all();
            $categories = Category::all();
            return $view->with(compact('prod_types','measurement_scales','stores','categories'));
        });
    }
}

<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProdType;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;
use Illuminate\Support\Facades\Auth;
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
        // i am uising this $all_products for the search feature in my application, that's why i'm only extracting the product names
        $all_products = json_encode(array_values(Product::pluck('name')->toArray()));
        // $all_products = json_encode(array_values(Auth::user()->products()->pluck('name')->toArray()));
        // just incase i need to access all the products as a collection
        $all_products_obj = (Product::all());
        // View::share() shares data to all the views
        View::share(compact('all_products', 'all_products_obj'));

        View::composer(['*.edit', '*.create', '*.index'], function ($view) {
            $prod_types = ProdType::get(['id', 'name']);//global
            $measurement_scales = MeasurementScale::all(); //global
            $stores = Auth::user()->stores; //personal
            $categories = Auth::user()->categories; //personal

            return $view->with(compact('prod_types','measurement_scales','stores','categories'));
        });
    }
}

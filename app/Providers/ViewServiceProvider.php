<?php

namespace App\Providers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProdType;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use App\Models\LowQtyMeasurementScale;
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
        // this is a test for all those who do not believe that softwares are powerful and that the hardware
        // depends on the software to function properly
        View::share(compact('all_products', 'all_products_obj'));

        View::composer(['*.edit', '*.create', '*.index'], function ($view) {
            $prod_types = ProdType::get(['id', 'name']);//global

            // product qty_scales
            $qty_scales = MeasurementScale::where('user_id','0')
            ->orWhere('user_id', Auth::user()->id)
            ->get(); //global

            $low_qty_scales = LowQtyMeasurementScale::where('user_id','0')
            ->orWhere('user_id', Auth::user()->id)
            ->get(); //global

            $critical_qty_scales = MeasurementScale::where('user_id','0')
            ->orWhere('user_id', Auth::user()->id)
            ->get(); //global


            $stores = Auth::user()->stores; //personal
            $categories = Auth::user()->categories; //personal

            return $view->with(compact('prod_types','qty_scales', 'low_qty_scales', 'critical_qty_scales', 'stores','categories'));
        });
    }
}

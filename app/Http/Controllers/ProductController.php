<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\ProdType;
use Illuminate\Http\Request;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(Product::first()->name);
        // don't mind me just decided to waste time
        $products = Product::get(['id', 'name', 'qty', 'status', 'price', 'notes']);
        // dd($products);
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // data is already shared via viewcomposer in viewserviceprovider
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $validated = $request->validate([// 'name' => ['min:8, max:50'],// 'tags' => ['min:8, max:50'],// ]);

        // create new category on user request 
        if (isset($request->new_category_name) and !empty($request->new_category_name))
            $cat =  Category::firstOrcreate([
                'name' => $request->new_category_name
            ]);
            
        // create product using the new category
        $newProduct = $cat->products()->create($request->all());

        return ($newProduct) ?  back()->with('success', "Product -- {$newProduct->name} created successfully :)")
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Product $product)
    {
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        // validation will be done later

        $dataInput = $request->all(); //very important
        // create a new category if requested by the user
        if (isset($request->new_category_name) and !empty($request->new_category_name)) {
            $newcat = Category::firstOrCreate(['name' => $request->new_category_name]);
            $dataInput['category_id'] = $newcat->id; //add it to your list of input fields that'll be updated
        }
        $stat = $product->update($dataInput);
        return $stat ? back()->with('success', 'Update successful')
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Product $product)
    {
        $product_name =  $product->name;
        $deleted  = $product->delete();
        return ($deleted) ? back()->with('success', "$product_name deleted from inventory")
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
    }
}

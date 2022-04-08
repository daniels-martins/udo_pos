<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::user()) {
            // return redirect()->route('login');
        }
        $products = Cart::content();
        return view('cart.index', compact('products'));

        return ['cart page okay'];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Cart::destroy();
        // we select only the users products that meet a certain criterion
        // the request->id === the product_id
        $product = Auth::user()->products()->where('id', $request->id)->first();
        $added = Cart::add($product, 1);
        if ($request->ajax() && $added) {
            return  
            response()->json([
                    'cart' => Cart::content(),
                    "productInCart" => $added
                ]);
        }
        return 'this guy na better ' . $product->name;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        return ['salom'];
        // $rowId = 'da39a3ee5e6b4b0d3255bfef95601890afd80709';

        // Cart::update($rowId, $request->qty); // Will update the quantity
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($row_id)
    {
        // return ['hello'];
        // search for item in cart using the rowId
        $foundInCart = (Cart::search(function ($cartItem, $rowId) use($row_id) {
            return $rowId === $row_id;
        })) ;
       if ($foundInCart) Cart::remove($row_id);
       else return response()->json([
        'operation' => 'failed',
        'item_name' => request('name'),
        'message' => 'item not in cart'
       ]);
        
        if (request()->ajax()) {
            return  $foundInCart
            ?   response()->json([
                    'operation' => 'success',
                    'item_name' => request('item_name')
                ])
            : response()->json([
                    'operation' => 'failed',
                    'item_name' => request('name')
                ]);
        }
    }
}

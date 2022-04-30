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

        $cart_items = Cart::content();
        return view('cart.index', compact('cart_items'));
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
        // NB: The request->id === the product_id
        $product_id = $request->id;
        $product = Auth::user()->products()->where('id', $product_id)->first();
        // return $product;
        // check for duplicates
        $foundInCartColl = (Cart::search(function ($cartItem) use ($product_id) {
            return (int) $cartItem->id === (int) $product_id;
        }));
        $foundInCart = $foundInCartColl->first();

        // we only take ajax calls for adding to cart. the POS is ajax based.
        if ($request->ajax()) {
            // return (bool)$foundInCart;

            if ($foundInCart)
                return response()->json([
                    // 'cart' => Cart::content(),
                    "productInCart" => $foundInCart,
                    'duplicate' => 1,
                    'message' =>  'product already added' //not in use
                ]);
            if ($added = Cart::add($product, 1))
                return
                    response()->json([
                        // 'cart' => Cart::content(),
                        "productInCart" => $added,
                        'duplicate' => 0,
                    ]);
        }
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
    public function update(Request $request, $row_id)
    {
        // return response()->json([$row_id, request()->qty]);
        Cart::update($row_id, $request->qty); // Will update the quantity
        return response()->json([
            'sms' => 'Success! cart updated'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($row_id)
    {
        // search for item in cart using the rowId
        $foundInCartColl = (Cart::search(function ($cartItem, $rowId) use ($row_id) {
            return $rowId === $row_id;
        }));

        if ($foundInCart = $foundInCartColl->first()) {

            $deleted = Cart::remove($row_id); //returns null

            if (request()->ajax()) {
                return $deleted == Null
                    ?   response()->json(['operation' => 'success', 'item_name' => request('item_name')])
                    :   response()->json(['operation' => 'failed', 'item_name' => request('item_name')]);
            } else {
                // html response
                return  $deleted == Null
                    ?   back()->with('success', "Item $foundInCart->name removed from cart")
                    :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
            }
        } else {
            // "code to execute if item was not found in cart";
            if (request()->ajax())
                return response()->json([
                    'operation' => 'failed',
                    'item_name' => request('item_name'),
                    'message' => 'item' . request('item_name') . ' not in cart'
                ]);
            else //html response
                return back()->with('error', 'Oops! Item -- ' . request('item_name') . ' not found in cart.');
        }
    }
}

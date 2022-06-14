<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
// use Gloudemans\Shoppingcart\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
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
        return view('admin.cart.index', compact('cart_items'));
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
            else if ($added = Cart::add($product, 1)){
                $added->model = $added->model;
                return
                    response()->json([
                        // 'cart' => Cart::content(),
                        "productInCart" => $added,
                        'duplicate' => 0,
                    ]);
                }
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
        $itemInCartAndModel = $this->find($row_id);

        Cart::update($row_id, $request->qty); // Will update the quantity

        // get the item subtotal after updating the item in the cart
        $itemInCartAndModel->subTotal =   $itemInCartAndModel->subTotal();

        return response()->json([
            'sms' => 'Success! cart updated',
            'alert_type' => 'success',
            'item' => $itemInCartAndModel,
            // 'item_subtotal' => $itemInCartAndModel->subtotal(),
            // 'item_subtotal' =>  $itemInCartAndModel->subTotal
        ]);
    }


    /**
     * Find a cart item using the rowId.
     *
     * @param  int  $row_id represents the rowId of the cart_item
     * @return \Illuminate\Http\Response
     */
    public function find(string $row_id = null)
    {
        // strlen($row_id) > 14;
        $isProduct_id = strlen($row_id) <= 20 ?: false;

        // if(preg_match("/[a-z]/i", $row_id)){
        //     // print "it has alphabet!";
        //     $isProduct_id = true;
        // }

        if ($isProduct_id)  $found = $this->findWithProductId($row_id);
        else $found = $this->findWithRowId($row_id);
        $found->model = $found->model;
        $found->subTotal = $found->subTotal();
        return $found;
    }

    public function findWithRowId(string $rowId = null)
    {
        $foundInCartColl = (Cart::search(function ($cartItem) use ($rowId) {
            return (string) $cartItem->rowId === (string) $rowId;
        }));    
        return $foundInCartColl->first();
    }


    public function findWithProductId(string $product_id = null)
    {
        $foundInCartColl = (Cart::search(function ($cartItem) use ($product_id) {
            return (int) $cartItem->id === (int) $product_id;
        }));  
        return $foundInCartColl->first();
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($row_id)
    {
        // return dd('we here');
        // use this for emptying the cart
        if(!$row_id){
            return  (Cart::destroy() == null) 
            ?   back()->with('success', "cart emptied")
            :   back()->with('warning', 'Oops! Something went wrong. Please Try again');
        }


        // search for item in cart using the rowId
        $foundInCartColl = (Cart::search(function ($cartItem, $rowId) use ($row_id) {
            return $rowId === $row_id;
        }));

        if ($foundInCart = $foundInCartColl->first()) {

            $deleted = Cart::remove($row_id); //returns null if there are no errors

            if (request()->ajax()) {
                return $deleted == null
                    ?   response()->json(['operation' => 'success', 'item_name' => request('item_name')])
                    :   response()->json(['operation' => 'failed', 'item_name' => request('item_name')]);
            } else {
                // html response
                return  $deleted == null
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

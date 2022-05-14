<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Events\FreshOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Gloudemans\Shoppingcart\Facades\Cart;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        if (Auth::guard('web')->check()) {
            # code...
            // step 1: create an order
            $this_order = new Order([
                // billing info

                // mandatory
                'billing_name' => $request->billing_name ?? null, //unknownBuyer

                // optional for complex shippings

                'billing_address' => $request->billing_address ?? null,
                'billing_phone' => $request->billing_phone ?? null,
                'amount' => Cart::subTotal(),

                // receiver info: who is gonna receive this order
                'reciever_name' => 'unknownReceiver '  ?? null,
                'ship_address' => 'unknownReceiverAddress'  ?? null,
                'receiver_phone' => 'unknownReceiverPhone'  ?? null,


                // location info for international shipping 
                'city' => 'unknownReceiverCity'  ?? null,
                'state' => 'unknownReceiverState'  ?? null,
                'zip' => 'unknownReceiverZip'  ?? null,
                'order' => 'unknownReceiverOrder'  ?? null,
                // city, state, zip country

                // tracking information for order
                'is_shipped' => '1|0',
                'tracking_num' => '$invoice number' . '$uniqueTrackingNum', //db Contraint 20 characters

                // cart/order items
                'basket' => Cart::content()

            ]);
            $this_order->save();

            // step 2: print the order as an invoice

            event(new FreshOrder($this_order));
        } else if (Auth::guard('emp')->check()) {
            # employee code...
            dd('employee');
        }
        //employee will use their bosse's user aza for storing orders

        //let's store an order 


        // lets create an invoice for it via event
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        //
    }
}

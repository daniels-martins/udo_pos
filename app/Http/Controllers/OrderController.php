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
        // possible refactor {udo}
        // dd($request->all());
        // if (Auth::guard('web | anyauth')->check()) {  
        if (Auth::guard('web')->check()) {
            // step 1: create an order
            $newOrder = Auth::user()->orders()->create([
                // billing info

                // mandatory
                'billing_name' => $request->billing_name ?? null, //unknownBuyer

                // optional for complex shippings
                'billing_address' => $request->billing_address ?? null,
                'billing_phone' => $request->billing_phone ?? null,
                'amount' => Cart::subTotal(),

                // receiver info: who is gonna receive this order
                'reciever_name' => $request->reciever_name  ?? $request->billing_name,
                'ship_address' => $request->ship_address ?? $request->billing_address,
                'receiver_phone' => $request->receiver_phone ?? $request->billing_phone,


                // location info for international shipping 
                'city' => 'unknownReceiverCity'  ?? null,
                'state' => 'unknownReceiverState'  ?? null,
                'zip' => 'unknownReceiverZip'  ?? null,
                // 'country' => 'unknownReceiverOrder'  ?? null,
                // city, state, zip country

                // tracking information for order
                'shipping_fee' => $request->shipping_fee ?? 0,
                'is_shipped' => '1',
                'tracking_num' => '$invoice_number' . '$uniqueTrackingNum', //db Contraint 20 characters

                // payment info
                'is_paid' => $request->is_paid,

                // cart/order items
                'basket' => Cart::content()

            ]);

            // we ensure that we retrieve the right order from the db
            $lastOrder = Auth::user()->orders()->latest()->first();

            // generate invoice for this order
            return redirect()->route('invoices.index', ['order' => $lastOrder->id, '']);
        } else if (Auth::guard('emp')->check()) {
            # employee code...
            dd('employee');
            //employee will use their bosse's user aza for storing orders
            //Next: let's store an order
        }
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

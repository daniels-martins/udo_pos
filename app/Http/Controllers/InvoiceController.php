<?php

namespace App\Http\Controllers;

// use App\Models\Invoice;
use App\Models\Order;

use Illuminate\Http\Request;
use LaravelDaily\Invoices\Invoice;
use Illuminate\Support\Facades\Auth;
use LaravelDaily\Invoices\Classes\Buyer;
use Gloudemans\Shoppingcart\Facades\Cart;
use LaravelDaily\Invoices\Classes\Seller;
use LaravelDaily\Invoices\Classes\InvoiceItem;

class InvoiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // Preparing the order
        $order = Order::findOrFail($request->order);

        $obj = json_decode($order->basket);
        // dd($obj);
        $items = collect($obj);

        // Preparing the vendor / seller / Merchant
        $auth_seller = new Seller();

        $auth_seller->name = strtoupper(auth()->user()->firm->name);
        $auth_seller->address = strtoupper(auth()->user()->firm->head_office) . ', LAGOS';
        $auth_seller->phone = auth()->user()->firm->phone;
        $auth_seller->custom_fields = [
            'SWIFT/IBAN' => 'BANK101',
        ];

        // Preparing the buyer
        $customer = new Buyer([
            'name'          => $order->billing_name ?? 'Walk-in Customer',
            'email'          => $order->billing_email ?? 'none',
            'custom_fields' => [
                'email' => $order->billing_email ?? 'none', //this has to be integrated in the migration for the orders table
                'customer address' => $order->billing_address,
                'customer phone' => $order->billing_phone,
                'Order Amount' => "₦" . Cart::subTotal()
            ],
        ]);

        // this is where u use the loop over the items 
        // initialize an empty array for the formatted cart_items
        $cartItems = [];

        foreach ($items as $item) {
            $item = (new InvoiceItem())
                ->title($item->name)
                ->pricePerUnit($item->price)
                ->quantity($item->qty);
            $cartItems[] = $item;
        }

        // payment status : ascertain the order payment status from the db and update accordinly
        // this is useful when you're trying to retrieve order data from the db

        // $order->payment
        // ->status($order->is_paid)


        $invoice = Invoice::make()
            // research how to add custom data to invoice
            // ->setCustomData('amount', 455)
            //     ->getCustomData()
            // SELLER
            ->seller($auth_seller)

            // BUYER
            ->buyer($customer)

            // CURRENCY

            // ->logo('jsj')
            ->currencySymbol("₦")
            ->currencyFraction('kobo')
            ->currencyCode('NGN')
            
            // ->taxRate(config('cart.tax'))

            // ->status($order->is_paid)
            ->payUntilDays(0)

            // PRODUCT
            ->addItems($cartItems);
        // ->shipping(1.99)
        // ->discountByPercent(10)

        // dd($invoice);
        // return $invoice->toHtml();
        // return $invoice->download();
        //  $invoice->total_amount = ($invoice->total_amount);
        return $invoice->stream();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return 'mamlid';
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Order $order)
    {
        //
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function show(Invoice $invoice)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoice $invoice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Invoice $invoice)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoice  $invoice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoice $invoice)
    {
        //
    }
}

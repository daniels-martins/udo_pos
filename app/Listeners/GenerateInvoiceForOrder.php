<?php

namespace App\Listeners;

use App\Events\FreshOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;


use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;
use LaravelDaily\Invoices\Classes\Seller;

// use App\Http\Controllers\InvoiceController;


class GenerateInvoiceForOrder
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(FreshOrder $event)
    {
        $freshOrder = $event->order;
        // dd($freshOrder);
        // return view('admin.dashboard_main');
        return route('invoices.index');
    }
}

<?php

namespace App\Listeners;

use App\Events\FreshOrder;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Http;


use LaravelDaily\Invoices\Invoice;
use LaravelDaily\Invoices\Classes\Buyer;
use LaravelDaily\Invoices\Classes\InvoiceItem;

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
        return response()->json([
            'sms' => 'ccoie lion',
            'sesms' => 'ccoie lion',
        ]);
        
        // this invoice needs the following :
        // 1. a customer data
        //  a product(s) model
        // All of which should be provided in the order model
        $customer = new Buyer([
            'name'          => 'Johnie Dover',
            'custom_fields' => [
                'email' => 'test@example.com',
            ],
        ]);

        $item = (new InvoiceItem())->title('Service 1')->pricePerUnit(2);

        $invoice = Invoice::make()

        // CURRENCY

        // ->logo('jsj')
            ->currencySymbol("₦")
            ->currencyFraction('kobo')
            ->currencyCode('NGN')

            // BUYER
            ->buyer($customer)
            ->taxRate(1)
            
            // PRODUCT
            ->addItem($item);
        // ->shipping(1.99)
        // ->discountByPercent(10)
        // dd($invoice);

        // return $invoice->toHtml();
        // return $invoice->download();
        return $invoice->stream();

    }
}

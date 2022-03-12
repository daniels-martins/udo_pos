<?php

namespace Database\Seeders;

use App\Models\ProdType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProdTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    // protected $table = ProdType::class;
    public function run()
    {
        $new_type  = new ProdType();
        $new_type->name = 'standard';
        $new_type->desc = 'A simple standard product is the most common and easily-understandable product type in WooCommerce. A simple product is a unique, stand-alone, physical product that you may have to ship to the customer. To start with, you can create a simple product, assign a price & SKU for the product, and start selling them. eg: Books.
        Simple standard products are one of the easiest to configure. You can add price, SKU and stock details, and publish a simple product. While creating a new product, you can select ‘Simple product’ from the drop-down.
        https://learnwoo.com/woocommerce-different-product-types/';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'grouped';
        $new_type->desc = ' A grouped product is a cluster of simple products clubbed together to form a single entity. The grouped product won’t have a price or other features. The identity of the grouped product is created by a number of child products that have unique features of their own. As soon as you create a grouped product, you can add at least one child product to the grouped product. Your customers can purchase any of the child products from the grouped product individually as well. eg: A set of six glasses.
        You can select the option ‘Grouped product’ from the drop-down menu and specify the products you are linking together. There is no need to set a price for the Grouped product as it will be dependent on the child products';
        $new_type->save();



        $new_type  = new ProdType();
        $new_type->name = 'virtual';
        $new_type->desc = ' A virtual product is simply defined as a product that is not a physical entity. For this reason, there is no need to ship such a product. Therefore defining and configuring a virtual product is a simple and straightforward process. You don’t have to bother about details such as product dimensions and weight, which are generally part of any other product settings. eg: You list a service (rendered in person) as a product in your store. To make a product virtual, you can select the checkbox for it, while creating the product.';
        $new_type->save();



        $new_type  = new ProdType();
        $new_type->name = 'downloadable';
        $new_type->desc = ' Similar to virtual products, downloadable products also don’t require shipping. They are available as a downloadable file with a specified path or URL. In most cases, there will be a limit on the number of downloads of such products. In a seemingly ironic way, WooCommerce allows setting shipping options for downloadable products. This is in fact to include the scenario where you want to send a packaged version (like a CD) of the product to the customer. If your product is only downloadable and has no physical version, you can mark it as a virtual product. Similar to virtual products, you can tick the specific checkbox while creating downloadable products. An additional step while creating downloadable products will be to specify the file path and other details like user access restrictions.';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'external/affiliate';
        $new_type->desc = ' There are cases where you list a product in your store, but you are not the actual seller of the product. Your customers who wish to purchase such products will be redirected to the URL that you specify in the product settings. There is no need for you to add any product-specific data on your store.
        While creating the product, you can choose the ‘External/Affiliate product’ option from the drop-down. Here, you will have to specify the url of the product as well as the text to be displayed on the Add-to-Cart button.';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'variable';
        $new_type->desc = ' This product type lets you add variations to the same product to create a complex, variable product. Each variation of the product has its own price, SKU, available stock, etc. eg: A shirt or t-shirt with different sizes and different colors. While creating the product, you can select the ‘Variable product’ option from the drop-down. To be able to create different variations, you will have to set up attributes and define values to each of them. You can use different attributes and values to create variations. After that, you can manually create available variations or create all possible variations in one go. You can update individual details for each variation, after all required variations are created.';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'subscription';
        $new_type->desc = ' You can create subscription products using Simple subscriptions and variable subscriptions. With the help of the plugin, you will be able to manage subscription products effectively with recurring payment options and more. While creating the product you can choose ‘Simple subscription’ or ‘Variable subscription’ and then set up the other aspects of the product.';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'bookable';
        $new_type->desc = 'While creating the product, you can choose the option, ‘Bookable product’ from the drop-down. The product will have options to help you define the available time slots for booking, which customers can choose from. It can be a great option for rentals, accommodation bookings, appointments and events.';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'membership';
        $new_type->desc = 'helps you sell memberships as a product type, and provide restricted access to different membership levels. Moreover, you can combine it with subscriptions to have some interesting features added to memberships, like recurring payments. When you use the Membership product type, your store will have an option to associate any of your product types to a membership plan. You can simply create a product of the desired type, and then create different membership plans as attribute values. The plugin helps you define the membership plans and then choose to tie it to the product you have created. ';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'bundled';
        $new_type->desc = ' you can create bundled products on your store. There will be an option in the Product Data meta box to choose the product type as ‘Product Bundle’ You can include any other product type of your choice to the bundle, except for Grouped and External products. For a bundled product, you can add a new price, or keep the same price of the individual products in the bundle. ';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'auctions';
        $new_type->desc = ' With the help of this product type, you can feature different auctions in your store. You can easily add other specifications that are required for an Auction product such as start and end times, bid increments, etc. ';
        $new_type->save();


        $new_type  = new ProdType();
        $new_type->name = 'simple';
        $new_type->desc = ' A simple standard product is the most common and easily-understandable product type in WooCommerce. A simple product is a unique, stand-alone, physical product that you may have to ship to the customer. To start with, you can create a simple product, assign a price & SKU for the product, and start selling them. eg: Books.
        Simple standard products are one of the easiest to configure. You can add price, SKU and stock details, and publish a simple product. While creating a new product, you can select ‘Simple product’ from the drop-down.
        https://learnwoo.com/woocommerce-different-product-types/';
        $new_type->save();

    }
}

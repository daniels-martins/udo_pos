<?php

use App\Models\Product;
use App\Models\StoreWarehouse;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_store_warehouse', function (Blueprint $table) {
            $table->id();
            // $table->unsignedBigInteger('product_id');
            // $table->unsignedBigInteger('store_warehouse_id');

            $table->foreignIdFor(Product::class, 'product_id')->onDelete('cascade');
            $table->foreignIdFor(StoreWarehouse::class, 'store_warehouse_id')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('product_store_warehouse');
    }
};

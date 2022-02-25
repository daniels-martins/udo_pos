<?php

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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->unsignedSmallInteger('product_type')->references('id')->on('prod_types')->default('1');
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('category')->nullable();
            $table->string('supplier')->nullable();
            $table->string('brand')->nullable();
            $table->string('img')->nullable();
            // eg. code25, code128 etc.
            $table->string('barcode_symbiology')->nullable();
            $table->string('unit')->nullable();
            $table->unsignedInteger('qty')->nullable();
            $table->string('price');
            $table->string('tax')->nullable();
            $table->enum('tax_method', ['inclusive', 'exclusive'])->nullable();
            $table->unsignedSmallInteger('store')->references('id')->on('stores')->nullable();
            $table->string('desc')->nullable();
            $table->unsignedTinyInteger('status')->default(1)->nullable();
            $table->unsignedSmallInteger('alert_qty')->default(20);
            $table->unsignedSmallInteger('critical_alert_qty')->default(10);

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
        Schema::dropIfExists('products');
    }
};

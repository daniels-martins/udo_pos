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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->id();

            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->string('username')->nullable();
            $table->string('email', 50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('mobile', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('img')->nullable();
            // HOME ADDRESS
            $table->string('billing_address', 250)->nullable();
            // SHOP ADDRESS
            $table->string('shipping_address', 250)->nullable();
            $table->unsignedSmallInteger('store')->references('id')->on('stores')->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 30)->nullable();
            $table->unsignedSmallInteger('country')->references('id')->on('countries')->nullable()->default('1');
            
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
        Schema::dropIfExists('suppliers');
    }
};

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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('username')->unique();
            $table->string('fname', 50)->nullable();
            $table->string('lname', 50)->nullable();

            $table->string('email', 50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // IF ALIVE OR NOT
            $table->tinyInteger('is_contact')->nullable();
            // is debtor
            $table->tinyInteger('is_debtor')->nullable();
            // HOME ADDRESS
            $table->string('billing_address', 250)->nullable();
            // SHOP ADDRESS
            $table->string('shipping_address', 250)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('img')->nullable();
            $table->string('notes')->nullable();
            $table->unsignedSmallInteger('store')->references('id')->on('stores')->nullable();


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
        Schema::dropIfExists('customers');
    }
};

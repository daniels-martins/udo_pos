<?php

use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->nullable();
            $table->unsignedFloat('amount');

            // billing/payers info
            $table->string('billing_name', 100)->nullable();
            $table->string('billing_address', 100)->nullable();
            $table->string('billing_address2', 100)->nullable();
            $table->string('billing_phone', 20)->nullable();

            // receiver info -- could be buyer or a delegate from buyer
            $table->string('reciever_name', 100)->nullable();
            $table->string('ship_address', 100)->nullable();
            $table->string('ship_address2', 100)->nullable();
            $table->string('receiver_phone', 20)->nullable();

            // location info
            $table->string('city', 50)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('zip', 20)->nullable();
            $table->string('country', 50)->nullable();
            
            $table->string('phone', 20)->nullable();
            $table->unsignedFloat('shipping_fee');
            $table->string('email')->nullable();
            $table->binary('is_shipped')->nullable();
            $table->string('tax', 20)->nullable();
            $table->string('tracking_num', 20)->nullable();


            
            // foreign keys
            $table->foreignIdFor(User::class);
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
        Schema::dropIfExists('orders');
    }
};

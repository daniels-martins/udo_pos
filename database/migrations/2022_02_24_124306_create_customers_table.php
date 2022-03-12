<?php

use App\Models\Country;
use App\Models\StoreWarehouse;
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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();

            $table->string('username', 50)->unique();
            $table->string('fname', 50)->nullable();
            $table->string('lname', 50)->nullable();

            $table->string('email', 50)->unique()->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // IF HE IS AN ACTIVE CUSTOMER OR NOT
            $table->binary('is_contact')->nullable();
            // is A debtor?
            $table->binary('is_debtor')->nullable();
            // HOME ADDRESS
            $table->string('billing_address', 250)->nullable();
            // SHOP ADDRESS
            $table->string('shipping_address', 250)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('phone', 15)->unique()->nullable();
            $table->string('img')->nullable();
            $table->text('notes')->nullable();

            // foreign keys were added in later migrations
            $table->foreignIdFor(Country::class)->nullable()->default('1');
            $table->foreignIdFor(StoreWarehouse::class)->nullable()->default(1);
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

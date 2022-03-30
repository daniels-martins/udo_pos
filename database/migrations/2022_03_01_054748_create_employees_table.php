<?php

use App\Models\User;
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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('username',50);
            $table->string('fname', 50)->nullable();
            $table->string('lname', 50)->nullable();

            $table->string('email', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            // IF ALIVE OR NOT
            $table->binary('is_contact')->nullable();
            // is debtor
            $table->binary('is_debtor')->nullable();
            // HOME ADDRESS
            $table->string('billing_address', 250)->nullable();
            // SHOP ADDRESS
            $table->string('shipping_address', 250)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('img')->nullable();
            $table->text('notes')->nullable();

            // foreign keys
            $table->foreignIdFor(StoreWarehouse::class)->default('1');
            $table->foreignIdFor(Country::class)->nullable()->default('1');

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
        Schema::dropIfExists('employees');
    }
};

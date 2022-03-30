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
        Schema::create('suppliers', function (Blueprint $table) {
            $table->unsignedTinyInteger('id', true);

            $table->string('fname', 30)->nullable();
            $table->string('lname', 30)->nullable();
            $table->string('username')->nullable();
            $table->string('email', 50)->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->string('mobile', 15)->nullable();
            $table->string('phone', 15)->nullable();
            $table->string('img')->nullable();
            // HOME ADDRESS
            $table->string('billing_address', 250)->nullable();
            // SHOP ADDRESS
            $table->string('shipping_address', 250)->nullable();
            $table->string('city', 50)->nullable();
            $table->string('state', 30)->nullable();

            // foreign keys
            $table->foreignIdFor(StoreWarehouse::class)->nullable();
            $table->foreignIdFor(Country::class)->nullable()->default('1');

            //new (scalablility)
            $table->foreignIdFor(User::class); //identifying information are not nullable



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

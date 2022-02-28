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
        Schema::create('store_warehouses', function (Blueprint $table){
            $table->id();

            $table->string('name');
            
            $table->string('address')->nullable();
            $table->string('location')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            
            $table->string('desc')->nullable();
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('purpose',['hybrid', 'warehouse', 'shop'])->nullable();
            $table->string('manager')->nullable ();
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
        Schema::dropIfExists('store_warehouses');
    }
};

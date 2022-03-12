<?php

use App\Models\Country;
use App\Models\Employee;
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
            $table->unsignedTinyInteger('id')->autoIncrement();

            $table->string('name');
        
            $table->string('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            
            $table->string('desc')->nullable();
        
            $table->enum('status', ['active', 'inactive'])->nullable();
            $table->enum('purpose',['hybrid', 'warehouse', 'shop'])->nullable()->default('hybrid');

            // foreign keys
            // faulty logic a store has many employees and not the other way round.
            // $table->string('manager')->references('employee_id')->on('employees')->nullable();
            
            // $table->string('country_id')->references('id')->on('countries')->nullable();
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
        Schema::dropIfExists('store_warehouses');
    }
};

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
        Schema::create('prod_types', function (Blueprint $table) {
            $table->unsignedSmallInteger('id', true); // min:0|max:65,535
            $table->string('name')->unique();
            $table->longText('desc')->unique()->nullable();


            //new (scalablility)
            $table->foreignIdFor(User::class)->onDelete('cascade'); //identifying information are not nullable

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
        Schema::dropIfExists('prod_types');
    }
};

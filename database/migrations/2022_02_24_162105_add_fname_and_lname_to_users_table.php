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
        Schema::table('users', function (Blueprint $table) {
            $table->string('fname')->nullable()->after('email_verified_at');
            $table->string('lname')->nullable()->after('fname');
            $table->string('img')->nullable()->after('lname');
            $table->enum('sex', ['M', 'F'])->nullable()->after('img');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            if (Schema::hasColumns('users', ['fname', 'lname', 'img', 'sex']))
                Schema::dropColumns('users', ['fname', 'lname', 'img', 'sex']);
        });
    }
};

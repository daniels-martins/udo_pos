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
        Schema::table('low_qty_measurement_scales', function (Blueprint $table) {
            //foreign
            $table->foreignIdFor(User::class);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('low_qty_measurement_scales', function (Blueprint $table) {
             if (Schema::hasColumn('low_qty_measurement_scales', 'user_id')) {
                Schema::dropColumns('low_qty_measurement_scales', ['user_id'] );
            }
        });
    }
};

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
        Schema::table('critical_qty_measurement_scales', function (Blueprint $table) {
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
        Schema::table('critical_qty_measurement_scales', function (Blueprint $table) {
            if (Schema::hasColumn('critical_qty_measurement_scales', 'user_id')) {
                Schema::dropColumns('critical_qty_measurement_scales', ['user_id'] );
            }
        });
    }
};

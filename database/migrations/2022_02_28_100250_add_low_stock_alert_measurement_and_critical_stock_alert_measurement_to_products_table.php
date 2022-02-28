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
        Schema::table('products', function (Blueprint $table) {
            $table->unsignedSmallInteger('low_stock_alert_measurement')->nullable();
            $table->unsignedSmallInteger('critical_stock_alert_measurement')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            if (Schema::hasColumns('products', [
                'low_stock_alert_measurement',
                'critical_stock_alert_measurement'
            ])) {
                Schema::dropColumns('products', [
                    'low_stock_alert_measurement',
                    'critical_stock_alert_measurement'
                ]);
            }
        });
    }
};

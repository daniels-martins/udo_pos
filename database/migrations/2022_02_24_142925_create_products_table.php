<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\ProdType;
use App\Models\Supplier;
use App\Models\StoreWarehouse;
use App\Models\MeasurementScale;
use App\Models\LowQtyMeasurementScale;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use App\Models\CriticalQtyMeasurementScale;
use Illuminate\Database\Migrations\Migration;
use App\Models\CriticalQuantityMeasurementScale;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('code')->nullable();
            $table->string('img')->nullable();
            // eg. code25, code128 etc.
            $table->unsignedInteger('qty')->nullable()->default(10);
            $table->string('price');
            //value of discount will be created on the fly using the model
            $table->enum('discount_type', ['fixed', 'percentage'])->nullable();
            $table->unsignedInteger('discount_value')->nullable();
            $table->string('tax')->nullable();
            $table->enum('tax_method', ['inclusive', 'exclusive'])->nullable();
            $table->string('desc')->nullable();
            $table->longText('details')->nullable();
            $table->text('tags')->nullable();
            $table->binary('status')->default(1)->nullable(); //shows availability
            $table->unsignedSmallInteger('low_stock_alert_qty')->default(40);
            $table->unsignedSmallInteger('critical_stock_alert_qty')->default(10);

            $table->string('notes')->nullable();

            // foreign keys
            // $table->unsignedSmallInteger('category_id')->references('id')->on('categories')->nullable();
            $table->foreignIdFor(ProdType::class)->nullable();
            $table->foreignIdFor(Category::class)->nullable();
            // $table->foreignIdFor(BarcodeSymbology::class)->nullable();
            $table->foreignIdFor(StoreWarehouse::class)->nullable();
            $table->foreignIdFor(Brand::class)->nullable();
            $table->foreignIdFor(Supplier::class)->nullable();
            $table->foreignIdFor(MeasurementScale::class)->nullable();
            $table->foreignIdFor(LowQtyMeasurementScale::class)->nullable();
            $table->foreignIdFor(CriticalQtyMeasurementScale::class)->nullable();
            
            
            //new (scalablility)
            $table->foreignIdFor(User::class); //identifying informations are not nullable

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
        Schema::dropIfExists('products');
    }
};

<?php

use App\Models\Customization;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductCustomizationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('customization_product', static function (Blueprint $table) {
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('customization_id');

            $table->foreign('product_id')->references('id')->on((new Product())->getTable());
            $table->foreign('customization_id')->references('id')->on((new Customization())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::table('product_customization', static function (Blueprint $table) {
            //
        });
    }
}

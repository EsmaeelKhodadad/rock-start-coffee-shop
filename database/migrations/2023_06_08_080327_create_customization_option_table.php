<?php

use App\Models\Customization;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomizationOptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('customization_option', static function (Blueprint $table) {
            $table->unsignedBigInteger('customization_id');
            $table->unsignedBigInteger('option_id');
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

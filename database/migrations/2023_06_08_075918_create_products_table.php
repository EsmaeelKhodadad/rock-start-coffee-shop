<?php

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create((new Product())->getTable(), static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('creator_id');
            $table->string('title')->unique();
            $table->boolean('is_active')->default(true);
            $table->unsignedInteger('price')->default(Product::CONSTANT_PRICE);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists((new Product())->getTable());
    }
}

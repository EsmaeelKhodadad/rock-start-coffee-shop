<?php

use App\Models\Customization;
use App\Models\Option;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create((new OrderItem())->getTable(), static function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('order_id')->index();
            $table->unsignedBigInteger('product_id')->index();
            $table->unsignedBigInteger('customization_id')->nullable();
            $table->unsignedBigInteger('option_id')->nullable();
            $table->unsignedTinyInteger('number')->default(1);

            $table->timestamps();

            $table->foreign('order_id')->references('id')->on((new Order())->getTable());
            $table->foreign('product_id')->references('id')->on((new Product())->getTable());
            $table->foreign('customization_id')->references('id')->on((new Customization())->getTable());
            $table->foreign('option_id')->references('id')->on((new Option())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists((new OrderItem())->getTable());
    }
}

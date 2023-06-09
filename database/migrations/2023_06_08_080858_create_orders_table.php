<?php

use App\Models\Order;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create((new Order())->getTable(), static function (Blueprint $table) {
            $table->id();
            $table->string('status')->default(Order::STATUS_WAITING)->index();
            $table->unsignedBigInteger('user_id')->index();

            $table->timestamps();
            $table->softDeletes();

            $table->foreign('user_id')->references('id')->on((new User())->getTable());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists((new Order())->getTable());
    }
}

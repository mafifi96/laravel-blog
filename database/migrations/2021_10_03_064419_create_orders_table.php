<?php

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
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string("status")->nullable();
            $table->float("total_price");
            $table->foreignId("user_id")->constrained("users")->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();

        });


        Schema::create('order_product', function (Blueprint $table) {
            $table->foreignId("order_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("product_id")->constrained()->onDelete("cascade")->onUpdate("cascade");

        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

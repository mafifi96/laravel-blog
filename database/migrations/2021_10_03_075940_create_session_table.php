<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string("session_id")->primary();
            $table->timestamps();
        });

        Schema::create('carts', function (Blueprint $table) {
            $table->string("session_id");
            $table->string("product_name");
            $table->tinyInteger("quantity");
            $table->decimal("price");
            $table->foreignId("user_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreign("session_id")->references('session_id')->on("session")->onDelete("cascade");
            $table->foreignId("product_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
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
        Schema::dropIfExists('session');
    }
}

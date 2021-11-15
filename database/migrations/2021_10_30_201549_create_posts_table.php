<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string("title");
            $table->string("slug");
            $table->string("cover")->nullable();
            $table->longText("body");
            $table->foreignId("user_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("category_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string("name")->nullable();
            $table->timestamps();

        });


        Schema::create('post_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId("tag_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
            $table->foreignId("post_id")->constrained()->onDelete("cascade")->onUpdate("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('tags');
    }
}

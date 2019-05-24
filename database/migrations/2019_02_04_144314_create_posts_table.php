<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('hasFeatured', 3)->nullable();
            $table->string('featuredImage')->nullable();
            $table->string('mime')->nullable();
            $table->string('original_filename')->nullable();
            $table->unsignedInteger('categoriesId');
            $table->foreign('categoriesId')->references('id')->on('categories');
            $table->string('title');
            $table->string('headline');
            $table->text('content');
            $table->unsignedInteger('uploadedBy');
            $table->foreign('uploadedBy')->references('id')->on('users');
            $table->text('tags')->nullable();
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
        Schema::dropIfExists('posts');
    }
}

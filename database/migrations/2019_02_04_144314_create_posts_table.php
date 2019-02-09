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
            $table->integer('categoriesId');
            $table->string('title');
            $table->text('content');
            $table->string('uploadedBy');
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

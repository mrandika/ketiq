<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('onPost');
            $table->foreign('onPost')->references('id')->on('posts');
            $table->unsignedInteger('fromUser');
            $table->foreign('fromUser')->references('id')->on('users');
            $table->text('comment');
            $table->string('hasEdited', 3)->nullable();
            $table->bigInteger('likes')->default('0');
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
        Schema::dropIfExists('comments');
    }
}

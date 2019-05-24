<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\Hash;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger('membership')->nullable()->default('1');
            $table->foreign('membership')->references('id')->on('memberships');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });

        DB::table('users')->insert(
            array(
                'name' => 'Admin',
                'membership' => 3,
                'email' => 'admin@blog.com',
                'password' => Hash::make('mrandika'),
                'email_verified_at' => '2002-06-22 00:00:00',
                'created_at' => '2019-02-03 01:09:29',
                'updated_at' => '2019-02-03 01:09:29'
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}

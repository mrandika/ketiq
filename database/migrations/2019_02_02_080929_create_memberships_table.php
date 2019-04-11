<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMembershipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('memberships', function (Blueprint $table) {
            $table->increments('id');
            $table->string('member');
            $table->timestamps();
        });

        DB::table('memberships')->insert(
            array(
                'member' => 'FREE'
            )
        );
        DB::table('memberships')->insert(
            array(
                'member' => 'PREMIUM'
            )
        );
        DB::table('memberships')->insert(
            array(
                'member' => 'PLATINUM'
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
        Schema::dropIfExists('memberships');
    }
}

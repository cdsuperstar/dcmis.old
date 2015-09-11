<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSysnoticesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sysnotices', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('user_id')->unsigned();
            $table->integer('senpart')->unsigned();
            $table->integer('recpart')->unsigned();
            $table->text('content');
            $table->timestamps();
        });
        Schema::create('sysnoticereads', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('sysnotice_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('sysnotice_id')->references('id')->on('sysnotices')
                ->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sysnoticereads');
        Schema::drop('sysnotices');
    }
}

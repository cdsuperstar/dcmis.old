<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePxxxbsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pxxxbs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo');
            $table->string('phone');
            $table->text('web');
            $table->timestamps();
        });
        Schema::create('pxxxb_user',function (Blueprint $table){
            $table->integer('user_id')->unsigned();
            $table->integer('pxxxb_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pxxxb_id')->references('id')->on('pxxxbs')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->primary(['user_id', 'pxxxb_id']);

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('pxxxb_user');
        Schema::drop('pxxxbs');
    }
}

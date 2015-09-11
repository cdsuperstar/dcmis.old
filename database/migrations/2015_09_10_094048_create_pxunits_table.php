<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePxunitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pxunits', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('logo')->nullable();
            $table->string('phone');
            $table->text('web')->nullable();
            $table->timestamps();
        });
        Schema::create('user_pxunit', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('pxunit_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pxunit_id')->references('id')->on('pxunits')
                ->onUpdate('cascade')->onDelete('cascade');

            $table->primary(['user_id', 'pxunit_id']);
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('user_pxunit');
        Schema::drop('pxunits');
    }
}

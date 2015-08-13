<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDcmodelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dcmodels', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
            $table->string('title');
            $table->string('group')->nullable();
            $table->boolean('isgroup');
            $table->string('icon');
            $table->string('url');
            $table->string('templateUrl');
            $table->tinyInteger('order');
            $table->string('controller');
            $table->text('componentid');
            $table->text('script');
            $table->text('css');
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
        Schema::drop('dcmodels');
    }
}

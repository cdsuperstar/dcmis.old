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
            $table->tinyInteger('ismenu');
            $table->string('icon');
            $table->string('url');
            $table->string('templateUrl');
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

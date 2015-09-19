<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserprofilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('userprofiles', function (Blueprint $table) {
            //BEING ALL
            $table->integer('id')->unsigned();
            $table->foreign('id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
            $table->string('no')->nullable();
            $table->string('name')->nullable();
            $table->string('mz')->nullable();
            $table->string('address')->nullable();
            $table->string('sex',1)->nullable();
            $table->date('tdate')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone1')->nullable();
            //END ALL
            //BEGIN employee
            $table->string('zgxl')->nullable();
            $table->string('zgzt')->nullable();
            $table->text('jjlxr')->nullable();
            $table->text('bz')->nullable();
            //END employee
/*
xxmc	学校名称
bjmc	班级名称
name1	法定监护人姓名
jhrgx	法定监护人关系
jhrdz	法定监护人联系地址
*/
            //BEGIN student
            $table->string('schoolname')->nullable();
            $table->string('schooldclass')->nullable();

            $table->string('name1')->nullable();
            $table->string('prelation1')->nullable();
            $table->string('phone2')->nullable();

            $table->string('name2')->nullable();
            $table->string('prelation2')->nullable();
            $table->string('phone3')->nullable();
            $table->string('address1')->nullable();
            //END student

            $table->string('usertype')->nullable(); //student teacher employee
            $table->primary('id');

/*
            no	工号
name	姓名
sex	性别
tdate	出生日期
zgxl	学历
zgzt	职员状态
phone	联系电话1
phone1	联系电话2
jjlxr	紧急联系人及电话（text）
bz	地址/备注
            */
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
        Schema::drop('userprofiles');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIpTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ip', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->comment('用户表id');
            $table->char('ip',50)->comment('IP地址');
            $table->char('vtime',50)->comment('访问时间');
            $table->char('terrace',50)->comment('访问位置');
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
        Schema::dropIfExists('ip');
    }
}

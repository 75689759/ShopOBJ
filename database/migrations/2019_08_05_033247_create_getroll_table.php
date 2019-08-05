<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGetrollTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('getroll', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid')->comment('用户表id');
            $table->integer('gid')->comment('商品表id');
            $table->char('did',50)->comment('优惠金额');
            $table->char('expiration',50)->comment('过期时间');
            $table->enum('use',['0','1','2'])->comment('使用状态：0待使用，1已使用，2失效');
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
        Schema::dropIfExists('getroll');
    }
}

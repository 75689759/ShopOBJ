<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('users_id')->comment('用户表id');
            $table->integer('goods_id')->comment('商品表id');
            $table->text('content')->comment('内容');
            $table->integer('ctime')->comment('发帖时间');
            $table->enum('reputation',['1','2','3'])->comment('评价等级：1好评，2中评，3差评');
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
        Schema::dropIfExists('post');
    }
}

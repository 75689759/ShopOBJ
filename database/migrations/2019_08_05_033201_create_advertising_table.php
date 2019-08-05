<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvertisingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advertising', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('desc')->comment('排序');
            $table->char('pic',255)->comment('图片名');
            $table->char('link',255)->comment('链接');
            $table->integer('atime')->comment('添加时间');
            $table->enum('astatus',['1','2'])->comment('状态：1显示，2隐藏');
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
        Schema::dropIfExists('advertising');
    }
}

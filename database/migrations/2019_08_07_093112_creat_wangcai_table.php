<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatWangcaiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wangcai', function (Blueprint $table) {
            $table->bigIncrements('id')->comment('分类id');
            $table->char('name', 50)->comment('分类名称');
            $table->text('explain')->comment('分类说明');
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

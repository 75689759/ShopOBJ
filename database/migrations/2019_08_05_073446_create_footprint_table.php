<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFootprintTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('footprint', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("我的足迹id");
            $table->Integer('uusers_id')->comment("用户id");
            $table->Integer('goods_id')->comment("商品id");
            $table->string('time','50')->comment("访问时间");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('footprint');
    }
}

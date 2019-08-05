<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("订单详情id");
            $table->Integer('orders_id')->comment("订单id");
            $table->Integer('goods_id')->comment("商品id");
            $table->Integer('addtime')->comment("购买时间");
            $table->Integer('num')->comment("数量");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item');
    }
}

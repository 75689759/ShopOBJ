<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("订单id");
            $table->Integer('users_id')->comment("会员id");
            $table->Integer('shop_id')->comment("店铺id");
            $table->Integer('shipping_id')->comment("收货地址id");
            $table->string('code','32')->comment("订单编号");
            $table->string('phone','16')->comment("电话");
            $table->double('total',8,2)->comment("总金额");
            $table->enum('status', ['0','1','2','3','4','5'])->default('0')->comment("状态");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}

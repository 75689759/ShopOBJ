<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGoodsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("商品id");
            $table->Integer('cates_id')->comment("分类id");
            $table->Integer('shop_id')->comment("店铺id");
            $table->Integer('brand_id')->comment("品牌id");
            $table->string('gnum','50')->comment("产品编号");
            $table->string('goods','32')->comment("商品名称");
            $table->string('antistop','50')->comment("关键词");
            $table->double('original',6,2)->comment("原价");
            $table->string('unit','20')->comment("单位");
            $table->string('picname','255')->comment("图片名");
            $table->enum('state', ['1','2','3'])->default('1')->comment("状态");
            $table->Integer('store')->default('0')->comment("库存量");
            $table->Integer('num')->default('0')->comment("被购买数量");
            $table->Integer('clicknum')->comment("点击次数");
            $table->Integer('addtime')->comment("添加时间");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('goods');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('details', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("商品详情id");
            $table->Integer('goods_id')->comment("商品id");
            $table->string('company','50')->comment("产地");
            $table->text('descr')->comment('简介');
            $table->string('specification','255')->comment("规格");
            $table->string('color','255')->comment("颜色分类");
            $table->Integer('weight')->comment("产品重量");
            $table->string('photoname','255')->comment("图片名");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('details');
    }
}

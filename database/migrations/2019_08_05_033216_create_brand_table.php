<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('brand', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id')->comment('商家id');
            $table->char('bname',32)->unique()->comment('品牌名');
            $table->integer('number')->comment('品牌序号');
            $table->char('blogo',125)->comment('品牌logo');
            $table->char('Country',32)->comment('所属国家');
            $table->char('describe',125)->comment('描述');
            $table->enum('state',['1','2'])->comment('状态：1启用，2停用');
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
        Schema::dropIfExists('brand');
    }
}

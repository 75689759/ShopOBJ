<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTasteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taste', function (Blueprint $table) {
            $table->bigIncrements('id')->comment("口味id");
            $table->Integer('goods_id')->comment("商品id");
            $table->string('tname','50')->comment("口味名称");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taste');
    }
}

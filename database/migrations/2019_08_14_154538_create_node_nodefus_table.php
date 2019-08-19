<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodeNodefusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('node_nodefu', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('node_id')->comment('节点表');
            $table->integer('nodefu_id')->comment('节点表');
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
        Schema::dropIfExists('node_nodefus');
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNodefuNodeTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nodefu_node_types', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('nodefu_id')->comment('节点表');
            $table->integer('node_type_id')->comment('权限类');
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
        Schema::dropIfExists('nodefu_node_types');
    }
}

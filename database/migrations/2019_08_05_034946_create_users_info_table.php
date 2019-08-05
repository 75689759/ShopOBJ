<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_info', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('uid')->comment('关联用户表id');
            $table->char('profile', 50)->comment('用户头像');
            $table->enum('sex', [0,1])->default(0)->comment('状态：0为女，1为男。默认为1');
            $table->integer('jf')->default(0)->comment('积分：500以下:普通用户 ; 500~999:铁牌用户 ; 1000~1499:铜牌用户 ; 1500~1999:银牌用户 ; 2000~2499:金牌用户 ; 2500~2999:钻石用户 ; 3000~3499:蓝钻用户 ; 5000以上:红钻用户');
            $table->integer('browse')->default(0)->comment('浏览条数');
            $table->integer('paypwd')->default(0)->comment('支付密码');
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
        Schema::dropIfExists('users_info');
    }
}

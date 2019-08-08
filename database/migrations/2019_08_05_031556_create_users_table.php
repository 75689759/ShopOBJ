<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('uname', 32)->unique()->comment('用户名');
            $table->char('pwd', 255)->comment('密码');
            $table->char('email', 50)->nullable()->comment('邮箱');
            $table->char('phone', 50)->nullable()->comment('手机号');
            $table->enum('state', [0, 1])->default(0)->comment('状态：0为启用，1为禁用。默认为1');
            $table->enum('emailsta', [0, 1])->default(0)->comment('状态：0为等待验证，1为验证成功。默认为0');
            $table->rememberToken()->comment('token验证');
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
        Schema::dropIfExists('users');
    }
}

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user', function (Blueprint $table) {
            $table->string('id', 36)->comment('主键 ID');
            $table->string('username', 40)->default('')->comment('用户名');
            $table->string('password', 50)->default('')->comment('密码');
            $table->string('realname', 50)->default('')->comment('姓名');
            $table->string('key', 65)->default('')->comment('用户名和姓名的关键字搜索: username#realname');
            $table->string('avatar', 255)->default('')->comment('头像');
            $table->string('unit_code', 32)->default('')->comment('单位代码');
            $table->string('unit_name', 100)->default('')->comment('单位 名称');
            $table->tinyInteger('type')->default('0')->comment('用户类型 0:普通用户，1:高级用户');
            $table->tinyInteger('is_disabled')->default('0')->comment('是否禁用 0: 否, 1: 是');
            $table->dateTime('expired_at')->nullable()->comment('帐号过期时间');
            $table->timestamp('password_update_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('密码更新时间');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('修改时间');
            $table->primary('id');
            $table->unique('username', 'uk_username');
            $table->index('key', 'idx_key');
            $table->index('created_at', 'idx_created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user');
    }
}

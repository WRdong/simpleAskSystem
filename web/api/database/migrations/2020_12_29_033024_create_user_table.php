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
            $table->string('name', 50)->default('')->comment('姓名');
            $table->string('key', 65)->default('')->comment('用户名和姓名的关键字搜索: username#name');
            $table->string('password', 50)->default('')->comment('密码');
            $table->string("phone", 20)->default('')->comment("联系电话");
            $table->string("email", 50)->default('')->comment("email");
            $table->tinyInteger('type')->default('1')->comment('用户类型 1:普通用户，2:高级用户');
            $table->string('avatar', 255)->default('')->comment('头像');
            $table->string('signature', 255)->default('')->comment('个性签名');
            $table->string('title', 30)->default('')->comment('头衔');
            $table->string('group', 100)->default('')->comment('分组：某某单位－某某职位');
            $table->string('country', 50)->default('')->comment('国家');
            $table->string('area_code', 10)->default('')->comment('地区代码');
            $table->string('address', 100)->default('')->comment("地址");
            $table->string('unit_code', 32)->default('')->comment('单位代码');
            $table->string('unit_name', 100)->default('')->comment('单位 名称');
            $table->tinyInteger('is_disabled')->default('0')->comment('是否禁用 0: 否, 1: 是');
            $table->dateTime('expired_at')->nullable()->comment('帐号过期时间');
            $table->timestamp('password_update_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('密码更新时间');
            $table->ipAddress('last_login_ip')->default('')->comment('最后登录IP');
            $table->timestamp('last_login_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('最后登录时间');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('修改时间');
            $table->primary('id');
            $table->unique('username', 'uk_username');
            $table->index('key', 'idx_key');
            $table->index('phone', 'idx_phone');
            $table->index('last_login_ip', 'idx_last_login_ip');
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

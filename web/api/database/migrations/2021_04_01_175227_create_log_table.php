<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
class CreateLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log', function (Blueprint $table) {
            $table->string('id', 32)->comment('主键ID');
            $table->string('username', 40)->default('')->comment('用户名');
            $table->string('name', 50)->default('')->comment('姓名');
            $table->string('module', 50)->default('')->comment('模块');
            $table->string('module_name', 50)->default('')->comment('模块名称');
            $table->string('action', 50)->default('')->comment('操作');
            $table->string('action_name', 50)->default('')->comment('操作名称');
            $table->string('desc', 255)->comment('描述');
            $table->json('detail')->comment('详细描述');
            $table->ipAddress('ip')->comment('IP地址');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'))->comment('创建时间');
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'))->comment('修改时间');
            $table->primary('id');
            $table->index('username', 'idx_username');
            $table->index(['module', 'action'], 'idx_module_action');
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
        Schema::dropIfExists('log');
    }
}

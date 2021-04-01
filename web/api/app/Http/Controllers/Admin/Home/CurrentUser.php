<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: CurrentUser.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 11:48 上午
 * Created by PhpStorm
 */

namespace App\Http\Controllers\Admin\Home;

use App\Exceptions\ApiException;
use App\Exceptions\LogicException;
use App\Http\Controllers\Common\AdminController;
use App\Logic\Admin\AdminUserLogic;
use Carbon\Carbon;

class CurrentUser extends AdminController
{


    public function run()
    {
        $params = $this->input();
        $logic = new AdminUserLogic();
        try {
            $ret = $logic->getUser('admin');
        } catch (LogicException $e) {
            $this->throwLogicException($e);
        }
        $this->log('user', 'view', '查看 用户 admin 信息');
        $ret['now'] = Carbon::now()->toDateTimeString();
        return $this->json($ret);
    }

}

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

use App\Http\Controllers\Common\AdminController;
use App\Logic\Admin\AdminUserLogic;

class CurrentUser extends AdminController
{


    public function run()
    {
        $params = $this->input();
        $logic = new AdminUserLogic();
        $ret = $logic->getUser('admin');
        return $this->json($ret);
    }

}

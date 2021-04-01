<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: AdminUserLogic.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 5:47 下午
 * Created by PhpStorm
 */

namespace App\Logic\Admin;


use App\Logic\AdminLogic;
use App\Models\Admin\AdminUser;

class AdminUserLogic extends AdminLogic
{

    public function getUser($id)
    {
        $user = AdminUser::find($id);
        return  $user ? $user->toArray() : [];
    }
}

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
use App\Http\Controllers\Common\AdminController;

class CurrentUser extends AdminController
{


    public function run()
    {
        $params = $this->input();
        throw new ApiException(2);
    }

}

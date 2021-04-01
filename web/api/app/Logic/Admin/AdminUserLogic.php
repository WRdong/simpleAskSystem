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


use App\Exceptions\LogicException;
use App\Logic\AdminLogic;
use App\Models\Admin\AdminUser;

class AdminUserLogic extends AdminLogic
{

    public function getUser($id)
    {
        $user = AdminUser::find($id);
        if (empty($user)) {
            return [];
        }

        $user = $user->toArray();
        $user['userid'] = $user['username'];
        $user['tags'] = [
            [
                'key' => '1',
                'label' => '技术达人',
            ],
            [
                'key' => '2',
                'label' => '业务娴熟',
            ],
        ];
        $user['notifyCount'] = 10;
        $user['unreadCount'] = 9;
        $user['access'] = 'admin';
        $user['geographic'] = [
            'province' => [
                'key' => '330000',
                'label' => '浙江省',
            ],
            'city' => [
                'key' => '330100',
                'label' => '杭州市',
            ]
        ];


        return $user;
    }
}

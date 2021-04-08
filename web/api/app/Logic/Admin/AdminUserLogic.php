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
        throw new LogicException(-2);
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
        $user['avatar'] = 'https://gw.alipayobjects.com/zos/antfincdn/XAosXuNZyF/BiazfanxmamNRoxxVxka.png';
        $user['email'] = 'antdesign@alipay.com';
        $user['signature'] = '海纳百川，有容乃大';
        $user['title'] = '交互专家';
        $user['group'] = '蚂蚁金服－某某某事业群－某某平台部－某某技术部－UED';
        $user['address'] = '西湖区工专路 77 号';
        $user['phone'] = '0752-268888888';

        return $user;
    }
}

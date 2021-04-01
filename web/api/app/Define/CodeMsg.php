<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: CodeMsg.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 5:23 下午
 * Created by PhpStorm
 */

namespace App\Define;


class CodeMsg
{
    private static $message = [

        RetCode::SUCCESS => '成功',
        RetCode::ERR_PARAM => '参数错误',
        RetCode::ERR_SYSTEM => '系统错误',

        RetCode::ERR_INSTALLED => '系统已经安装',
        RetCode::ERR_NO_ACCESS => '您没有权限进行操作',
        RetCode::ERR_NO_ACCESS_DATA => '管理权限不足，无法操作',
        RetCode::ERR_DEVELOPING => '功能正在开发中',

        RetCode::ERR_FORBIDDEN => '禁止访问',
        RetCode::ERR_INTERFACE_NOT_EXISTS => '接口[ %s ]不存在',
        RetCode::ERR_METHOD_NOT_ALLOWED => '不允许的操作方式，请使用 [ %s ]',

        //登录
        RetCode::ERR_NO_LOGIN => '用户未登录',
        RetCode::ERR_LOGIN_FAIL_USER_NOT_FOUND => '用户未注册',
        RetCode::ERR_LOGIN_FAIL_PASSWORD_IS_WRONG => '用户名或者密码不正确',
        RetCode::ERR_LOGIN_FAIL_DISABLED => '禁止登录',
        RetCode::ERR_LOGIN_FAIL_NO_POWER_TO_APP => '没有权限登录此系统',
        RetCode::ERR_LOGIN_FAIL_EXPIRED => '帐号过期',
        RetCode::ERR_LOGIN_FAIL_DEVICE_DISABLED => '执法仪已被禁用',
        RetCode::ERR_LOGIN_FAIL_DEVICE_SCRAP => '执法仪已报废',
        RetCode::ERR_LOGIN_FAIL_DEVICE_DONT_INTO_PLATFORM => '终端账号禁止登录',
        RetCode::ERR_LOGIN_FAIL_NOT_ROLE => '请联系管理员，为该帐号设置角色并分配权限',
        RetCode::ERR_LOGIN_FAIL_DEVICE_UNIT => '使用帐号单位和设备单位不一致',
        RetCode::ERR_LOGIN_FAIL_ACCOUNT_USED_IN_OTHER_DEVICE =>"帐号已经在其它设备上使用",
        RetCode::ERR_LOGIN_FAIL_PASSWORD_EXPIRED => '密码过期',

        //用户
        RetCode::ERR_USER_NOT_FOUND => '没有此帐号',
        RetCode::ERR_USER_DELETE_SELF => '不能将自己删除',
        RetCode::ERR_USER_DISABLE_SELF => '不能将自己禁用',
        RetCode::ERR_USER_ENABLE_SELF => '不能将自己启用',
        RetCode::ERR_USER_USERNAME_REQUIRED => '用户名不能为空',
        RetCode::ERR_USER_REAL_NAME_REQUIRED => '用户姓名不能为空',
        RetCode::ERR_USER_USERNAME_EXSIED => '用户名已经存在',
        RetCode::ERR_USER_OLD_PASSWORD_WRONG => '旧密码不正确',
        RetCode::ERR_USER_EXPIRE_AT_WRONG => '过期时间不正确',
        RetCode::ERR_USER_PERSON_ALREADY_HAVE_ACCOUNT => '警员已经有一个帐号',
        RetCode::ERR_USER_IS_NOT_DEVICE_TYPE => '帐号不为终端帐号',
        RetCode::ERR_USER_IS_DISABLED => '帐号已经被禁用',
        RetCode::ERR_USER_IS_EXPIRE => "帐号已经过期",

    ];


    public static function getMessage($code, $vars = [])
    {
        $msg = self::$message[$code] ?? '';
        if (count($vars) == 0) {
            return  $msg;
        }
        $params = [$msg];
        foreach ($vars as $val) {
            $params[] = $val;
        }
        return call_user_func_array('sprintf', $params);
    }
}

<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: RetCode.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 5:24 下午
 * Created by PhpStorm
 */

namespace App\Define;


class RetCode
{
    const SUCCESS = 0;      //成功
    const ERR_PARAM = -1;   //参数错误
    const ERR_SYSTEM = -2; //系统错误


    const ERR_INSTALLED = -4; // 系统已经安装
    const ERR_NO_ACCESS = -5; // 没有权限
    const ERR_NO_ACCESS_DATA = -6; // 没有数据权限
    const ERR_LICENSE_FAIL = -7; //license 错误

    const ERR_DEVELOPING = -8; //功能正在开发中

    const ERR_FORBIDDEN = 403; //禁止访问
    const ERR_INTERFACE_NOT_EXISTS = 404; //接口不存在
    const ERR_METHOD_NOT_ALLOWED = 405;   //不允许的操作方法


    //登录
    const ERR_NO_LOGIN = -11; //未登录
    const ERR_LOGIN_FAIL_USER_NOT_FOUND = -12; // 登录失败,用户名不存在
    const ERR_LOGIN_FAIL_PASSWORD_IS_WRONG = -13; // 登录失败,密码不正确
    const ERR_LOGIN_FAIL_DISABLED = -14; // 登录失败,禁止登录
    const ERR_LOGIN_FAIL_NO_POWER_TO_APP = -15; //没有权限登录此系统
    const ERR_LOGIN_FAIL_EXPIRED = -16; // 登录失败,帐号过期
    const ERR_LOGIN_FAIL_DEVICE_DISABLED = -17; // 登录失败,禁止登录,执法仪禁用
    const ERR_LOGIN_FAIL_DEVICE_SCRAP = -18; // 登录失败,禁止登录,执法仪报废
    const ERR_LOGIN_FAIL_DEVICE_DONT_INTO_PLATFORM = -19; // 登录失败,终端帐号禁止登录
    const ERR_LOGIN_FAIL_NOT_ROLE = -20; // 登录失败,没有角色
    const ERR_LOGIN_FAIL_DEVICE_UNIT = -21; //登录失败, 使用帐号单位和设备单位不一致
    const ERR_LOGIN_FAIL_ACCOUNT_USED_IN_OTHER_DEVICE = -22; //登录失败, 帐号已经在其它设备上使用
    const ERR_LOGIN_FAIL_PASSWORD_EXPIRED = -23; // 登录失败,密码过期

    //用户
    const ERR_USER_NOT_FOUND = -1001; //用户不存在
    const ERR_USER_DELETE_SELF = -1002; //不能将自己删除
    const ERR_USER_DISABLE_SELF = -1003; //不能将自己禁用
    const ERR_USER_ENABLE_SELF = -1004; //不能将自己启用
    const ERR_USER_USERNAME_REQUIRED = -1005; //用户名不能为空
    const ERR_USER_REAL_NAME_REQUIRED = -1006; //用户姓名不能为空
    const ERR_USER_USERNAME_EXSIED = -1007; //用户名已经存在
    const ERR_USER_OLD_PASSWORD_WRONG = -1008; //旧密码不正确
    const ERR_USER_EXPIRE_AT_WRONG = -1009; //过期时间不正确
    const ERR_USER_PERSON_ALREADY_HAVE_ACCOUNT = -1010; // 警员已经有一个帐号
    const ERR_USER_IS_NOT_DEVICE_TYPE = -1011; // 帐号不为终端帐号
    const ERR_USER_IS_DISABLED = -1012; // 帐号已经被禁用
    const ERR_USER_IS_EXPIRE = -1013; // 帐号已经过期
}

<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: Uuid.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 2:41 下午
 * Created by PhpStorm
 */

namespace App\Utils;


class Uuid
{
    public static function create()
    {
        return self::uuid16();

    }
    public static function uuid16()
    {
        return substr(self::uuid32(), 0, 16);
    }

    public static function uuid32()
    {
        return str_replace('-', '', uuid_create());
    }

    public static function uuidTo36($uuid)
    {
        return substr($uuid, 0, 8) . '-'
            . substr($uuid, 8, 4) . '-'
            . substr($uuid, 12, 4) . '-'
            . substr($uuid, 16, 4) . '-'
            . substr($uuid, 20, 12);
    }
}

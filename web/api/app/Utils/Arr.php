<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: Arr.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 6:45 下午
 * Created by PhpStorm
 */

namespace App\Utils;


use Illuminate\Support\Str;

class Arr
{

    /**
     * 将数组的键名转为驼峰
     *
     * @param array $arr
     * @return array
     * @datetime 2019-03-19 16:05
     * @author   WRdong
     */
    public static function arrayKeyToCamelCase(array $arr): array
    {
        if (empty($arr)) {
            return $arr;
        }
        $_arr = [];
        foreach ($arr as $key => $value) {
            $k = Str::camel($key);
            if (is_array($value)) {
                $value = self::arrayKeyToCamelCase($value);
            }
            $_arr[$k] = $value;
        }

        return $_arr;
    }
}

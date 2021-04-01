<?php
/*
 * @Author: WR.dong
 * @Date: 2020-12-29 04:19:23
 * @Last Modified by: WR.dong
 * @Last Modified time: 2020-12-29 04:22:15
 */
namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Utils\Arr;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{




    /**
     * api 返回数据统一格式, 并将
     *
     * @param array $data
     * @param int $code
     * @param string $msg
     * @param bool $to_camel_case 是否需要转驼峰
     * @return array
     * @datetime 2019-03-18 15:54
     * @author   WRdong
     */
    protected function json($data = [], $code = 0, $to_camel_case = true)
    {
        if ($data && is_array($data) && $to_camel_case === true) {
            $data = Arr::arrayKeyToCamelCase($data);
        }
        if (config('app.debug')) {
            return [
                'success' => true,
                'code' => $code,
                'data' => $data,
                'sql' => DB::getQueryLog(),
            ];
        } else {
            return [
                'success' => true,
                'code' => $code,
                'data' => $data,
            ];
        }
    }
}

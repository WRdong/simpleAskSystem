<?php
/*
 * @Author: WR.dong
 * @Date: 2020-12-29 04:19:23
 * @Last Modified by: WR.dong
 * @Last Modified time: 2020-12-29 04:22:15
 */
namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Models\Admin\AdminLog;
use App\Utils\Arr;
use App\Utils\Uuid;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{

    protected $user;

    protected $requestId;

    public function __construct()
    {
        parent::__construct();
        $this->init();
    }

    protected function init()
    {
        $this->requestId = Uuid::uuid32();
//        $this->user = Auth::user();
        $this->user = new \stdClass();
    }

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

    protected function log($module, $action, $desc = '', $detail = [])
    {
        $log = new AdminLog();
        $log->id = $this->requestId;
//        $log->username = $this->user->username;
//        $log->name = $this->user->realname;
        $log->username = 'test';
        $log->name = '测试';
        $log->module = $module;
        $log->module_name = '测试 module';
        $log->action = $action;
        $log->action_name = '测试 action';
        $log->desc = $desc;
        $log->detail = json_encode($detail);
        $log->ip = app()->request->getClientIp();
        $log->save();
    }


}

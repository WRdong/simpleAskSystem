<?php

namespace App\Http\Controllers;

use App\Exceptions\ApiException;
use App\Exceptions\LogicException;
use Laravel\Lumen\Routing\Controller as BaseController;

class Controller extends BaseController
{

    protected $inputData;
    protected $perPage = 10;

    public function __construct()
    {
        $this->inputData = app()->request->all();
    }

    /**
     * 获取请求参数
     *
     * @param null $key 获取指定参数，null 时获取所有参数
     * @param null $default
     * @return mixed
     * @author   WR.dong
     */
    protected function input($key = null, $default = '')
    {
        $data = data_get($this->inputData, $key, $default);
        if (is_string($data)) {
            return trim($data);
        }
        return $data;
    }


    /**
     * 控制层 使用 ApiException 处理逻辑层异常
     * @param LogicException $e
     * @param int $showType
     * @throws ApiException
     */
    protected function throwLogicException(LogicException $e, $showType = 0)
    {
        throw new ApiException($e->getCode(), $e->getMsg(), $e->getData(), $showType, $e);
    }
}

<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: ApiException.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 2:23 下午
 * Created by PhpStorm
 */

namespace App\Exceptions;

use App\Define\CodeMsg;
use Exception;
use App\Utils\Uuid;
use Laravel\Lumen\Http\Request;

class ApiException extends Exception
{
    protected $httpCode = 200;
    protected $httpHeaders = [];

    protected $traceId;
    protected $code;
    protected $msg;
    protected $data;
    protected $showType;


    /**
     * ApiException constructor.
     * @param int $code
     * @param mixed $msg
     * @param mixed $data
     * @param int $showType
     * @param Throwable $previous
     * @param int $httpCode
     * @param array $headers
     */
    public function __construct(int $code, $msg = null, $data = null, $showType = 0, $previous = null, $httpCode = 200, $headers = [])
    {
        $this->traceId = Uuid::uuid32();
        $this->code = $code;
        $this->setMsg($msg);
        $this->setData($data);
        $this->showType = $showType;
        $this->httpCode = $httpCode;
        $this->httpHeaders = $headers;
        parent::__construct($this->msg, $code, $previous);
    }

    public function setCode(int $code)
    {
        $this->code = $code;
        return $this;
    }

    public function setMsg($msg)
    {
        if ($msg === null) {
            $this->msg = CodeMsg::getMessage($this->code);
        } elseif (is_string($msg)) {
            $this->msg = $msg;
        } elseif (is_array($msg)) {
            $this->msg = CodeMsg::getMessage($this->code, $this->msg);
        } else {
            $this->msg = '';
        }
        return $this;
    }

    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    public function setHttpCode(int $httpCode)
    {
        $this->httpCode = $httpCode;
        return $this;
    }

    public function setHeaders(array $headers)
    {
        $this->httpHeaders = $headers;
        return $this;
    }

    public function setShowType(int $type)
    {
        $this->showType = $type;
        return $this;
    }

    public function getJsonResponse()
    {
        return [
            'success' => false,
            'errorCode' => $this->code,
            'errorMessage' => $this->msg,
            'data' => $this->data ?? new \stdClass() ,
            'showType' => $this->showType,
            'traceId' => $this->traceId,
        ];
    }

    /**
     * 最后渲染 response
     * @param Request $request
     * @return \Illuminate\Http\Response|\Laravel\Lumen\Http\ResponseFactory
     */
    public function render(Request $request)
    {
        $this->log($request);
        if (config('app.debug')) {
            $jsonResponse = $this->getJsonResponse();
            $jsonResponse['file'] = $this->getFile();
            $jsonResponse['line'] = $this->getLine();
            return response($jsonResponse, $this->httpCode, $this->httpHeaders);
        }
        return response($this->getJsonResponse(), $this->httpCode, $this->httpHeaders);
    }

    /**
     * 重写异常日志报告 // 不适用默认日志记录
     * @throws Exception
     */
    public function report()
    {
    }

    protected function log(Request $request)
    {
        try {
            $logger = \Log::stack(['api_error']);
        } catch (Exception $e) {
            throw $e;
        }
        $logger->error($this->getMessage(), [
            'traceId' => $this->traceId,
            'errorCode' => $this->code,
            'data' => $this->data,
            'file' => $this->getFile(),
            'line' => $this->getLine(),
            'clientIp' => $request->getClientIp(),
            'params' => $request->input(),
            'url' => $request->url(),
            'exception' => $this->showType == 2 ? $this : '',
        ]);

    }





}

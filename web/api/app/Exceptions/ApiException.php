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


use App\Utils\Uuid;

class ApiException extends \Exception
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
     * @param string $msg
     * @param null $data
     * @param int $showType
     * @param Throwable $previous
     * @param int $httpCode
     * @param array $headers
     */
    public function __construct(int $code, string $msg, $data = null, $showType = 0, $previous = null, $httpCode = 200, $headers = [])
    {
        $this->traceId = Uuid::uuid32();
        $this->code = $code;
        $this->msg = $msg;
        $this->setData($data);
        $this->showType = $showType;
        $this->httpCode = $httpCode;
        $this->httpHeaders = $headers;
        parent::__construct($msg, $code, $previous);
    }

    public function setCode(int $code)
    {
        $this->code = $code;
        return $this;
    }

    public function setMsg(string $msg)
    {
        $this->msg = $msg;
        return $this;
    }

    public function setData($data)
    {
        if ($data === null) {
            $this->data = new \stdClass();
        } else {
            $this->data = $data;
        }
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

    public function getResponse()
    {
        return response([
                'success' => false,
                'errorCode' => $this->code,
                'errorMessage' => $this->msg,
                'data' => $this->data,
                'showType' => $this->showType,
                'traceId' => $this->traceId,
            ],
            $this->httpCode,
            $this->httpHeaders
        );
    }



}

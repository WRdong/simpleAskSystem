<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: LogicException.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 9:19 下午
 * Created by PhpStorm
 */

namespace App\Exceptions;

use Exception;

class LogicException extends Exception
{

    protected $msg;
    protected $data;

    public function __construct(int $code, $msg = '', $data = null, $previous = null)
    {
        $this->msg = $msg == '' ? null : $msg;
        $this->data = $data;
        parent::__construct($msg, $code, $previous);
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function getData()
    {
        return $this->data;
    }

}

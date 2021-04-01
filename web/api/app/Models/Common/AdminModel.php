<?php
/**
 * Copyright 2021 WR.dong <blooddong@gmail.com>
 *
 * File: AdminModel.php
 * Author: WR.dong
 * Date: 2021/4/1
 * Time: 7:02 下午
 * Created by PhpStorm
 */

namespace App\Models\Common;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;
}

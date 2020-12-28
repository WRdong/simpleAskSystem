<?php
/*
 * @Author: WR.dong 
 * @Date: 2020-12-29 04:22:51 
 * @Last Modified by: WR.dong
 * @Last Modified time: 2020-12-29 04:24:42
 */

 namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Common\AdminController;

class Lists extends AdminController
{
    


    public function run()
    {


        return ['userList'];
    }
}
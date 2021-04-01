<?php


namespace App\Models\Admin;


use App\Models\User;

class AdminUser extends User
{
    protected $table = 'admin_user';

    protected $keyType = 'string';

    public $incrementing = false;

    public $timestamps = false;


}

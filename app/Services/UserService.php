<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 4/8/19
 * Time: 3:33 PM
 */

namespace App\Services;

use App\User;

class UserService
{
    public function __construct()
    {
    }

    public function create($params)
    {
        $params['password'] = bcrypt($params['password']);

        return User::query()->create($params);
    }

    public function listAll()
    {
        return User::query()->orderBy('id', 'DESC')->get();
    }
}

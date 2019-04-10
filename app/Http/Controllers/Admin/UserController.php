<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Services\UserService;

class UserController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create(CreateUserRequest $request)
    {
        $params      = $request->only('name', 'email', 'password');
        $userService = new UserService();
        $data        = $userService->create($params);

        return !empty($data) ? $this->success($data) : $this->error('ERROR');
    }

    public function listAll()
    {
        $userService = new UserService();
        $data        = $userService->listAll();
        return !empty($data) ? $this->success($data) : $this->error('ERROR');
    }
}

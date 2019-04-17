<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

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

    public function checkEmail(Request $request)
    {
        $email       = $request->get('email');
        \Log::info($email);
        $userService = new UserService();
        $data        = $userService->checkEmail($email);

        return $this->success($data);
    }
}

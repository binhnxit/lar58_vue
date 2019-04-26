<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\CreateUserRequest;
use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var $userService UserService
     */
    protected $userService;

    public function __construct()
    {
        parent::__construct();
        $this->userService = app(UserService::class);
    }

    /**
     * @param CreateUserRequest $request
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function create(CreateUserRequest $request)
    {
        $params      = $request->only('first_name', 'last_name', 'email', 'password');
        $avatar      = $request->file('avatar');
        $data        = $this->userService->create($params, $avatar);

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
        $email = $request->get('email');
        \Log::info($email);
        $userService = new UserService();
        $data        = $userService->checkEmail($email);

        return $this->success($data);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogin()
    {
        return view('admin.login');
    }

    public function login(LoginRequest $request)
    {
        $certificates = $request->only('email', 'password');

        if (Auth::attempt($certificates)) {
            return $this->success(true);
        }

        return $this->error('Invalid email or password', 403);
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LoginRequest;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getLogin()
    {
        if (auth()->check()) {
            return redirect()->route('admin.dashboard.index');
        }

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

    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        if ($request->wantsJson()) {
            return $this->success(true);
        }

        return redirect()->route('admin.login');
    }
}

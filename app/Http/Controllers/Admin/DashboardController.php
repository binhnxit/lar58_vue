<?php

namespace App\Http\Controllers\Admin;

use App\Entities\User;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return view('admin.index');
    }

    public function test()
    {
        $user = User::find(3);

        dd($user->hasRole('admin'));
    }
}

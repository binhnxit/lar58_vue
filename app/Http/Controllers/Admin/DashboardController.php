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
        $user = User::create(
            [
                'first_name' => 'binh',
                'last_name'  => 'nguyen',
                'email'      => str_random(5) . '@lar58vue.com',
                'password'   => bcrypt('password')
            ]
        );

        dd($user->toArray());
    }
}

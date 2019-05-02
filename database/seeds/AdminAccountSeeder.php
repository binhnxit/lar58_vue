<?php

use App\Entities\User;
use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Administrator',
            'last_name'  => '',
            'email'      => "admin@lar58vue.com",
            'password'   => bcrypt('password')
        ]);

        $role = Role::updateOrCreate([
            'name'        => 'admin',
            'description' => 'Administrator'
        ], [
            'name' => 'admin'
        ]);

        $user->assignRole($role);
    }
}

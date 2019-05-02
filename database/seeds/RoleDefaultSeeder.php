<?php

use Illuminate\Database\Seeder;
use Herode\Role\Role;

class RoleDefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::query()->insert([
            [
                'name'        => 'admin',
                'description' => 'Administrator'
            ],
            [
                'name'        => 'user',
                'description' => 'User'
            ]
        ]);
    }
}

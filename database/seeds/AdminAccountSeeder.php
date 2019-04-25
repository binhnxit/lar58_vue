<?php

use Illuminate\Database\Seeder;

class AdminAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'first_name'     => 'Administrator',
            'last_name'     => '',
            'email'    => 'admin@lar58vue.com',
            'password' => bcrypt('password')
        ]);
    }
}

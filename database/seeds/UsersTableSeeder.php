<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@admin',
            'address' => 'HN',
            'phone' => '0123456',
            'password' => bcrypt('123456'),
        ]);
    }
}

<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        DB::table('users')->insert([
            'user_status'   => 'active',
            'username'      => 'admin',
            'email'         => 'admin@surveysayz.com',
            'role'          => 'admin',
            'password'      => bcrypt('somesecret'),
            'first_name'    => 'Stefano',
            'last_name'     => 'Bozzi',
            'location'      => 'Puerto la Cruz, Anzoategui',
            'last_login'    => date('Y-m-d H:m:s'),
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);  
        
        DB::table('users')->insert([
            'user_status'   => 'active',
            'username'      => 'user',
            'email'         => 'user@surveysayz.com',
            'role'          => 'user',
            'password'      => bcrypt('somesecret'),
            'first_name'    => 'Luis',
            'last_name'     => 'Fernando',
            'location'      => 'Puerto la Cruz, Anzoategui',
            'last_login'    => date('Y-m-d H:m:s'),
            'created_at'    => date('Y-m-d H:m:s'),
            'updated_at'    => date('Y-m-d H:m:s')
        ]);

    }
}

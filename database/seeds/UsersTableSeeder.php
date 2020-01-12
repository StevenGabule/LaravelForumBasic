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
        App\User::create([
            'name'=> 'admin',
            'password' => bcrypt('admin'),
            'email' => 'admin@gmail.com',
            'admin' => 1,
            'avatar' => asset('avatars/avatar.png')
        ]);

        App\User::create([
            'name'=> 'John Paul Lim Gabule',
            'password' => bcrypt('password'),
            'email' => 'johnpaulgabule@gmail.com',
            'avatar' => asset('avatars/avatar.png')
        ]);
    }
}

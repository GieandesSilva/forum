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
        //

        App\User::create([

            'name' => 'Gieandes Silva',

            'password' => bcrypt('password'),

            'email' => 'contato@gieandessilva.com',

            'admin' => 1,

            'avatar' => asset('images/uploads/avatars/default.jpg')

        ]);
    }
}

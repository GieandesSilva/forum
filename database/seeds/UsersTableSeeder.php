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

            'avatar' => 'images/uploads/avatars/profile.jpg'

        ]);

        App\User::create([
            
            'name' => 'Danilo Tiago',

            'password' => bcrypt('password'),

            'email' => 'contato@danilotiago.com',

            'admin' => 2,

            'avatar' => 'images/uploads/avatars/default.jpg'

        ]);
    }
}

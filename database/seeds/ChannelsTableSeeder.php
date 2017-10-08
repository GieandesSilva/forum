<?php

use Illuminate\Database\Seeder;

use App\Channel;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    
    {
        //

        $channel1 =  [ 'title' => 'HTML', 'slug' => str_slug('HTML') ];
        $channel2 =  [ 'title' => 'CSS', 'slug' => str_slug('CSS') ];
        $channel3 =  [ 'title' => 'Javascript', 'slug' => str_slug('Javascript') ];
        $channel4 =  [ 'title' => 'Ajax', 'slug' => str_slug('Ajax') ];
        $channel5 =  [ 'title' => 'Jquery', 'slug' => str_slug('Jquery') ];
        $channel6 =  [ 'title' => 'PHP', 'slug' => str_slug('PHP') ];
        $channel7 =  [ 'title' => 'Java', 'slug' => str_slug('Java') ];
        $channel8 =  [ 'title' => 'Ruby', 'slug' => str_slug('Ruby') ];


        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
    }
}

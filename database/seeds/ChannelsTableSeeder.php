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

        $channel1 =  ['title' => 'HTML'];
        $channel2 =  ['title' => 'CSS'];
        $channel3 =  ['title' => 'Javascript'];
        $channel4 =  ['title' => 'Ajax'];
        $channel5 =  ['title' => 'Jquery'];
        $channel6 =  ['title' => 'PHP'];
        $channel7 =  ['title' => 'Java'];
        $channel8 =  ['title' => 'Ruby'];


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

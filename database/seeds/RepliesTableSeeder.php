<?php

use Illuminate\Database\Seeder;

use App\Reply;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $reply1 = [

            'user_id' => 1,

            'discussion_id' => 3,

            'content' => 'Mauris quam libero, elementum ut dictum sed, blandit quis odio. Suspendisse a consectetur risus. Etiam commodo felis sed vehicula feugiat. Suspendisse potenti.'

        ];

        $reply2 = [

            'user_id' => 2,

            'discussion_id' => 4,

            'content' => 'Vestibulum congue accumsan nisl, vitae dignissim dolor commodo a. Integer interdum tellus a libero vulputate, ut vestibulum sem congue.'

        ];

        $reply3 = [
            
            'user_id' => 1,

            'discussion_id' => 1,

            'content' => 'Etiam nisi purus, suscipit sit amet vestibulum eu, tincidunt quis magna. Vivamus bibendum suscipit dignissim. Donec gravida pharetra dolor.'

        ];

        $reply4 = [
            
            'user_id' => 2,

            'discussion_id' => 2,

            'content' => 'Donec elementum, felis a consectetur hendrerit, dolor turpis tempor urna, eget feugiat nibh risus sed nisi. Integer volutpat lacinia ex quis ultricies.'

        ];

        Reply::create($reply1);
        Reply::create($reply2);
        Reply::create($reply3);
        Reply::create($reply4);
        
    }
}

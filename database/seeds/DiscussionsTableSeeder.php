<?php

use Illuminate\Database\Seeder;

use App\Discussion;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $titulo1 = 'Implementing OAUTH2 with Laravel Passport';
        $titulo2 = 'Pagination in VueJs not Working Correctly';
        $titulo3 = 'VueJs Event Listeners for Child Components';
        $titulo4 = 'Laravel Homestead Error - Undetected Database';
        
        $discussion1 = [

            'title' => $titulo1,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis et efficitur velit. Duis dapibus varius finibus. Nullam eget tortor at mauris elementum dapibus sed vitae urna. Proin dictum magna ut mauris cursus luctus. Ut elementum ultrices diam eu pulvinar. Cras pharetra, tellus a condimentum tempus, metus ligula congue massa, at tincidunt sem sapien ut metus. Cras at posuere diam, a placerat dolor. Maecenas et dolor elementum, pulvinar tellus quis, faucibus urna. Sed placerat nulla lacus, auctor malesuada massa varius non. Vivamus rutrum odio ut urna aliquam porta.',
            
            'channel_id' => 1,
            
            'user_id' => 2,

            'slug' => str_slug($titulo1)

        ];

        $discussion2 = [
            
            'title' => $titulo2,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas fringilla posuere. Cras vel quam eu est ultricies lacinia. Vestibulum sit amet ligula cursus massa semper imperdiet vel in ligula. Proin lobortis turpis in ultricies rutrum. Integer accumsan tempus justo, id dictum purus iaculis in. In vel dolor ullamcorper, viverra erat a, venenatis felis. Donec malesuada mi neque, at maximus diam sodales nec. Sed semper ac sapien sed facilisis. Suspendisse id luctus augue. Nam eu ipsum elit. Vivamus tellus magna, dictum quis risus nec, laoreet luctus arcu. Sed sit amet massa in metus suscipit scelerisque. Pellentesque in pharetra quam, eget consectetur tellus.',
            
            'channel_id' => 2,
            
            'user_id' => 1,

            'slug' => str_slug($titulo2)

        ];
            
        $discussion3 = [
            
            'title' => $titulo3,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis non tortor dapibus pulvinar vel ac leo. Phasellus cursus elit ac mauris dictum, vitae interdum ipsum placerat. Aliquam id blandit lacus. Mauris cursus elementum metus, quis tincidunt nulla tristique ut. Aliquam elementum odio eu urna mattis ultrices. Ut lacus libero, dictum sit amet venenatis id, molestie at dolor. Donec id risus eros. Quisque in dolor sem. Phasellus venenatis enim at aliquam pharetra.',
            
            'channel_id' => 3,
            
            'user_id' => 1,

            'slug' => str_slug($titulo3)

        ];

        $discussion4 = [
            
            'title' => $titulo4,

            'content' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam eu turpis non tortor dapibus pulvinar vel ac leo. Phasellus cursus elit ac mauris dictum, vitae interdum ipsum placerat. Aliquam id blandit lacus. Mauris cursus elementum metus, quis tincidunt nulla tristique ut. Aliquam elementum odio eu urna mattis ultrices. Ut lacus libero, dictum sit amet venenatis id, molestie at dolor. Donec id risus eros. Quisque in dolor sem. Phasellus venenatis enim at aliquam pharetra.',
            
            'channel_id' => 4,
            
            'user_id' => 2,

            'slug' => str_slug($titulo4)

        ];


        Discussion::create($discussion1);
        Discussion::create($discussion2);
        Discussion::create($discussion3);
        Discussion::create($discussion4);
    }
}

<?php

use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Implementing OAUTH with laravel password';
        $t2 = 'Pagination in vuejs not working correctly.';
        $t3 = 'Vuejs event listeners for child components';
        $t4 = 'Laravel homestead error - undetected database';

        $d1 = [
            'title' => $t1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
            'channel_id' => 1,
            'user_id' => 2,
            'slug' => str_slug($t1),
        ];
        $d2 = [
            'title' => $t2,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t2),
        ];

        $d3 = [
            'title' => $t3,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
            'channel_id' => 2,
            'user_id' => 1,
            'slug' => str_slug($t3),
        ];

        $d4 = [
            'title' => $t4,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
            'channel_id' => 5,
            'user_id' => 1,
            'slug' => str_slug($t4),
        ];
        \App\Discussion::create($d1);
        \App\Discussion::create($d2);
        \App\Discussion::create($d3);
        \App\Discussion::create($d4);
    }
}

?>


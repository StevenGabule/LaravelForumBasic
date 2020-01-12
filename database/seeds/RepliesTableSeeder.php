<?php

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.'
        ];

        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
        ];

        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
        ];

        $r4 = [
            'user_id' => 4,
            'discussion_id' => 4,
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus aliquid architecto blanditiis, dolorem eaque earum exercitationem ipsam itaque laborum, libero maxime nihil quasi quia quisquam reprehenderit sit, vel veniam voluptatum.',
        ];
        \App\Reply::create($r1);
        \App\Reply::create($r2);
        \App\Reply::create($r3);
        \App\Reply::create($r4);
    }
}

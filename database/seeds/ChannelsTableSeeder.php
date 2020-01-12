<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel', 'slug' => str_slug('Laravel')];
        $channel2 = ['title' => 'Vue.js', 'slug' => str_slug('Vue.js')];
        $channel3 = ['title' => 'CSS3', 'slug' => str_slug('CSS3')];
        $channel4 = ['title' => 'JavaScript', 'slug' => str_slug('JavaScript')];
        $channel5 = ['title' => 'PHP Unit Testing', 'slug' => str_slug('PHP Unit Testing')];
        $channel6 = ['title' => 'Spark Apache', 'slug' => str_slug('Spark Apache')];
        $channel7 = ['title' => 'Lumen Ecosystem', 'slug' => str_slug('Lumen Ecosystem')];
        $channel8 = ['title' => 'Open Forge System', 'slug' => str_slug('Open Forge System')];

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

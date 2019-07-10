<?php

use App\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    public function run()
    {
        factory(Topic::class,10)->create();
    }
}

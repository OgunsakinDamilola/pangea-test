<?php

namespace Database\Seeders;

use App\Models\Topic;
use Illuminate\Database\Seeder;

class TopicsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $topics = [
            ['name' => 'topic1'],
            ['name' => 'topic2']
        ];
        Topic::insert($topics);
    }
}

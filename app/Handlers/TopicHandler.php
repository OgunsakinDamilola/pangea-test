<?php


namespace App\Handlers;


use App\Models\Topic;

trait TopicHandler
{
    public function createTopicWithName($name)
    {
        return Topic::create([
            'name' => $name
        ]);
    }

    public function getAllTopics()
    {
        return Topic::orderBy('name', 'desc')->get()->pluck('name');
    }

    public function getTopicWithName($name)
    {
        return Topic::where('name', $name)->first();
    }
}

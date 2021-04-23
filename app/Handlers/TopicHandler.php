<?php


namespace App\Handlers;


use App\Models\Topic;

trait TopicHandler
{
    public function createTopic($name)
    {
        return Topic::create([
            'name' => $name
        ]);
    }

    public function getAllTopics()
    {
        return Topic::orderBy('name, desc')->pluck('name')->get();
    }
}

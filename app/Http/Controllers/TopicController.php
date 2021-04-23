<?php

namespace App\Http\Controllers;

use App\Handlers\TopicHandler;
use App\Http\Requests\CreateTopicRequest;
use App\Models\Topic;

class TopicController extends Controller
{
    use TopicHandler;

    public function index()
    {
        $topics = $this->getAllTopics();
        if (!$topics) {
            return $this->jsonErrorResponse('Sorry, unable to get topics at the moment.');
        }
        return $this->jsonSuccessResponse('Topics returned', $topics);
    }

    public function create(CreateTopicRequest $request)
    {
        $topic = $this->createTopic($request->name);
        if (!$topic) {
            return $this->jsonErrorResponse('Sorry, unable to create new topic at the moment.');
        }
        return $this->jsonSuccessResponse('Topic created successfully', $topic);
    }
}

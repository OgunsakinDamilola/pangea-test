<?php

namespace App\Http\Controllers;

use App\Handlers\MessageHandler;
use App\Handlers\TopicHandler;
use App\Http\Requests\PublishMessageRequest;

class MessageController extends Controller
{
    use MessageHandler, TopicHandler;

    public function publish(PublishMessageRequest $request, $topicName){
        $topic = $this->getTopicWithName($topicName);
        if (empty($topic) || is_null($topic)) {
            return $this->jsonErrorResponse('Topic does not exist. Please create topic and try again');
        }

    }
}

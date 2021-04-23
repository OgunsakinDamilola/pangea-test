<?php

namespace App\Http\Controllers;

use App\Handlers\MessageHandler;
use App\Handlers\SubscriptionHandler;
use App\Handlers\TopicHandler;
use App\Http\Requests\PublishMessageRequest;

class MessageController extends Controller
{
    use MessageHandler, TopicHandler, SubscriptionHandler;

    public function publish(PublishMessageRequest $request, $topicName){
        $topic = $this->getTopicWithName($topicName);
        if (empty($topic) || is_null($topic)) {
            return $this->jsonErrorResponse('Topic does not exist. Please create topic and try again');
        }
        $topicSubscribers = $this->getTopicSubscriptions($topic->id);
        if(count($topicSubscribers) < 1) return $this->jsonErrorResponse('No subscriber found for topic. Try again');
        $data = [
          'topic' => $topicName,
          'data' => $request->all()
        ];
        $this->publishMessageToSubscribers($topicSubscribers,$data);
        return $this->jsonSuccessResponse('Message has been dispatched to subscribers.', [
            'payload' => $data,
            'subscribers' => $topicSubscribers
        ]);
    }
}

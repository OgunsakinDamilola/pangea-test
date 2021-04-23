<?php

namespace App\Http\Controllers;

use App\Handlers\SubscriptionHandler;
use App\Handlers\TopicHandler;
use App\Http\Requests\CreateSubscriptionRequest;

class SubscriptionController extends Controller
{
    use SubscriptionHandler, TopicHandler;

    /**
     * @param CreateSubscriptionRequest $request
     * @param $topicName
     * @return \Illuminate\Http\JsonResponse
     */
    public function create(CreateSubscriptionRequest $request, $topicName)
    {
        $topic = $this->getTopicWithName($topicName);
        if (empty($topic) || is_null($topic)) {
            return $this->jsonErrorResponse('Topic does not exist. Please create topic and try again');
        }
        $isSubscribed = $this->subscriptionExist($topic->id, $request->url);
        if($isSubscribed) return $this->jsonErrorResponse('Sorry, this url has already been subscribed to this topic');
        $createSubscription = $this->createSubscription($topic->id, $request->url);
        if (!$createSubscription) {
            return $this->jsonErrorResponse('Sorry, unable to subscribe to this topic at the moment, try again later');
        }
        return $this->jsonSuccessResponse('Subscribed to topic:' . $topic->name . ' successfully', [
            'topic' => $topic->name,
            'url' => $createSubscription->url
        ]);
    }

}

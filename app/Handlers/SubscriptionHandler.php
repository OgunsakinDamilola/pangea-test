<?php


namespace App\Handlers;


use App\Models\Subscription;

trait SubscriptionHandler
{
    public function subscriptionExist($topicId, $url){
        $subscription = Subscription::where('topic_id', $topicId)->where('url', $url)->first();
        if(is_null($subscription) || empty($subscription)) return false;
        return true;
    }
    public function createSubscription($topicId, $url)
    {
        return Subscription::create([
            'topic_id' => $topicId,
            'url' => $url
        ]);
    }


}

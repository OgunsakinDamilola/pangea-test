<?php


namespace App\Handlers;


use App\Jobs\PublishMessageToSubscriber;
use GuzzleHttp\Exception\ClientException;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Support\Facades\Http;

trait MessageHandler
{
    public function publishMessageToSubscribers($subscribers, $data)
    {
        foreach ($subscribers as $subscriber) {
            PublishMessageToSubscriber::dispatch($subscriber->url, $data);
        }
        return true;
    }

}

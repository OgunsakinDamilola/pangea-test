<?php

namespace App\Http\Controllers;

use App\Handlers\MessageHandler;
use App\Http\Requests\PublishMessageRequest;

class MessageController extends Controller
{
    use MessageHandler;

    public function publish(PublishMessageRequest $request){

    }
}

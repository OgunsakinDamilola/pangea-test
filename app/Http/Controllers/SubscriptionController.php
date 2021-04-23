<?php

namespace App\Http\Controllers;

use App\Handlers\SubscriptionHandler;
use App\Http\Requests\CreateSubscriptionRequest;

class SubscriptionController extends Controller
{
    use SubscriptionHandler;

    public function create(CreateSubscriptionRequest $request){

    }
}

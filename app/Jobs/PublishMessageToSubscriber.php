<?php

namespace App\Jobs;

use GuzzleHttp\Exception\ClientException;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Http\Client\ConnectionException;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class PublishMessageToSubscriber implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $url, $data;

    /**
     * Create a new job instance.
     *
     * @param $url
     * @param $data
     */
    public function __construct($url, $data)
    {
        $this->url = $url;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        try {
            $header = ['Content-Type' => 'application/json',];
            Http::withHeaders($header)->post($this->url, $this->data);
        } catch (ConnectionException $e) {
            Log::error($e);
            return abort('503', $e->getMessage());
        } catch (ClientException $e) {
            Log::error($e);
            return abort('503', $e->getMessage());
        }
    }
}

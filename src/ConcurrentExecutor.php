<?php 

namespace Vendor\ConcurrentLaravel;

use GuzzleHttp\Client;
use GuzzleHttp\Promise;
use GuzzleHttp\Promise\Utils;


class ConcurrentExecutor
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
    }

    public function execute(array $requests)
    {
        // Prepare the async requests
        $promises = [];
        foreach ($requests as $key => $request) {
            $options = [];
            if (isset($request['data'])) {
                $options['json'] = $request['data']; // For POST requests with body data
            }

            $promises[$key] = $this->client->requestAsync(
                $request['method'],
                $request['url'],
                $options
            );
        }

        // Wait for all promises to settle (i.e., finish the requests)
        $responses = Utils::settle($promises)->wait();


        // Process the responses
        $results = [];
        foreach ($responses as $key => $response) {
            if (isset($response['value'])) {
                $results[$key] = json_decode($response['value']->getBody(), true);
            } else {
                $results[$key] = ['error' => 'Failed to fetch data'];
            }
        }

        return $results;
    }
}

<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;

class APIController extends Controller
{

    private $client = null;
    const API_URL = 'http://172.16.1.200:5984/power';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->client = new Client([
            'base_uri' => self::API_URL,
            'headers' => ['Content-Type' => 'application/json'],
        ]);
    }

    /**
     * Get last metrics of one device
     * @param devid of the device
     * @param start the start date (TZ format - "2019-01-31")
     * @param end the end date (TZ format - "2019-01-31")
     * @param limit the limit of the query
     */
    public function getDeviceMetricsAPI($devid, $start, $end, $limit)
    {
        try {
            //$response = $this->client->get(self::API_URL . '/_design/docs/_view/by_devid?&descending=true&limit=' . $limit . '&startkey=["' . $devid . '","' . $start . '\ufff0"]&endkey=["' . $devid . '","' . $end . '"]');
            $response = $this->client->get(self::API_URL . '/_design/docs/_view/by_devid?&descending=true&limit=' . $limit . '&startkey=["' . $devid . '","' . $start . '\ufff0"]&endkey=["' . $devid . '","' . $end . '"]');
        } catch (RequestException $e) {
            $response = $this->StatusCodeHandling($e);
            return $response;
        }
        return json_decode($response->getBody(true)->getContents(), true);
    }

    public function StatusCodeHandling($e)
    {

        if ($e->getResponse()->getStatusCode() == '422') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '500') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } elseif ($e->getResponse()->getStatusCode() == '401') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;

        } elseif ($e->getResponse()->getStatusCode() == '403') {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        } else {
            $response = json_decode($e->getResponse()->getBody(true)->getContents());
            return $response;
        }

    }

}

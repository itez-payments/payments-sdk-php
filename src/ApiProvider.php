<?php

namespace ItezPayments;

use Exception;
use ItezPayments\Exception\ApiClientException;
use ItezPayments\Exception\ApiException;
use ItezPayments\Exception\ApiServerException;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ClientException;
use GuzzleHttp\Exception\GuzzleException;


class ApiProvider
{
    // const HOSTNAME = 'http://api.crypton.test';

    protected $apiKey;
    protected $privateKey;
    protected $host;


    public function __construct(string $host, string $apiKey, string $privateKey)
    {
        $this->host = $host;
        $this->apiKey = $apiKey;
        $this->privateKey = $privateKey;
    }

    /**
     * @throws ApiServerException
     * @throws ApiException
     * @throws ApiClientException
     */
    public function send(string $method, string $url, array $params = []): array
    {
        $client = new Client();

        try {
            $currentTime = time();
            $signature = $this->createSignature($currentTime, $method, $url, json_encode($params));
            // $signature = 'skip';

            $response = $client->request($method, $this->host . $url, [
                'headers' => [
                    'Content-Type' => 'application/json',
                    'api-key'      => $this->apiKey,
                    'signature'    => $signature,
                    'timestamp'    => $currentTime,
                ],
                'body'    => json_encode($params)
            ]);

            $content = json_decode($response->getBody()->getContents(), true);

            return (array)$content;
        } catch (ClientException $exception) {
            throw new ApiClientException($exception->getMessage(), $exception->getCode());
        } catch (GuzzleException $exception) {
            throw new ApiServerException($exception->getMessage(), $exception->getCode());
        } catch (Exception $exception) {
            throw new ApiException($exception->getMessage(), $exception->getCode());
        }
    }

    private function createSignature($ts, $httpMethod, $url, $httpBody): string
    {
        return hash_hmac('sha256', $ts . strtoupper($httpMethod) . $url . $httpBody, $this->privateKey);
    }

}

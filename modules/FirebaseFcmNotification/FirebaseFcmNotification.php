<?php

namespace Modules\FirebaseFcmNotification;

use GuzzleHttp\Client;

class FirebaseFcmNotification
{
    private $params;

    private function CLIENT()
    {
        return new Client(['verify' => config('firebasefcmnotification.verify'), 'base_uri' => config('firebasefcmnotification.server_url')]);
    }

    /**
     * Config notification to a single device
     */
    public function viaToken(array $data, string $token, string $channel = null): self
    {
        $this->params = [
            'to' => $token,
            'notification' => [
                'title' => $data['title'] ?? null,
                'body' => $data['message'] ?? null,
                'channelId' => $channel ?? \config('firebasefcmnotification.default_channel'),
            ],
            'data' => $data['data'] ? $data['data'] : null,
        ];

        return $this;
    }

    /**
     * Config notification to a group of devices
     */
    public function viaTopic(array $data, string $topic, string $channel = null): self
    {
        $this->params = [
            'to' => '/topics/'.implode('_', \explode(' ', $topic)),
            'notification' => [
                'title' => $data['title'] ?? null,
                'body' => $data['message'] ?? null,
                'channelId' => $channel ?? \config('firebasefcmnotification.default_channel'),
            ],
            'data' => $data['data'] ? $data['data'] : null,
        ];

        return $this;
    }

    /**
     * Send notification
     *
     * @param  array  $data
     * @param  string  $condition
     * @param  string|null  $channel
     * @return FirebaseFcmNotification
     */
    public function send()
    {
        $headers = [
            'Authorization' => 'Bearer '.\config('firebasefcmnotification.server_key'),
            'Content-Type' => 'application/json',
        ];
        $response = $this->CLIENT()->request('POST', 'send', [
            'headers' => $headers,
            'body' => json_encode($this->params),
        ]);

        $result = json_decode($response->getBody()->getContents(), true);
        if (isset($result['failure']) && $result['failure'] > 0) {
            throw new \Exception($result['results'][0]['error'] ?? '', 401);
        } elseif (isset($result['error']) && $result['error']) {
            throw new \Exception($result['error'] ?? '', 401);
        }

        return $result;
    }
}

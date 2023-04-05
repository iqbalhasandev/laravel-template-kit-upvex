<?php

namespace Modules\FirebaseFcmNotification\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Modules\FirebaseFcmNotification\Facades\FirebaseFcmNotification;

class FirebaseFcmNotificationJob implements ShouldQueue
{
    use Dispatchable;
    use InteractsWithQueue;
    use Queueable;
    use SerializesModels;

    /**
     * default variable
     */
    private $data = [];

    private $token;

    private $type;

    private $channel;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(array $data, string $token, string $type, $channel = null)
    {
        $this->data = $data;
        $this->token = $token;
        $this->type = $type;
        $this->channel = $channel;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        if ($this->type == 'topic') {
            try {
                $response = FirebaseFcmNotification::viaTopic($this->data, $this->token, $this->channel)->send();
            } catch (\Throwable $th) {
                throw new \Exception($th->getMessage(), 401);
            }
        } elseif ($this->type == 'token') {
            try {
                $response = FirebaseFcmNotification::viaToken($this->data, $this->token, $this->channel)->send();
            } catch (\Throwable $th) {
                throw new \Exception($th->getMessage(), 401);
            }
        } else {
            throw new \Exception('Invalid type', 404);
        }

        return $response;
    }
}

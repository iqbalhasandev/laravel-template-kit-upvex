<?php

namespace Modules\FirebaseFcmNotification\Broadcasting;

use Illuminate\Notifications\Notification;
use Modules\FirebaseFcmNotification\Jobs\FirebaseFcmNotificationJob;

class FirebaseFcmChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $response = $notification->toFirebaseFcm($notifiable);

        if (\array_key_exists('token', $response)) {
            FirebaseFcmNotificationJob::dispatch($response['data'] ?? [], $response['token'], $response['type'], $response['channel'] ?? null);
        }
    }
}

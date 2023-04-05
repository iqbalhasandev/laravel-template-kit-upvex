<?php

namespace Modules\FirebaseFcmNotification\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Modules\FirebaseFcmNotification\Broadcasting\FirebaseFcmChannel;

class UserNotificationFcmChannel extends Notification
{
    use Queueable;

    private array $data;

    private $token;

    private string $type;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(array $data, string $token, string $type)
    {
        $this->data = $data;
        $this->token = $token;
        $this->type = $type;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return [FirebaseFcmChannel::class];
    }

    public function toFirebaseFcm($notifiable)
    {
        return [
            'data' => [
                'title' => $this->data['title'] ?? null,
                'message' => $this->data['body'] ?? null,
                'channel' => $this->data['channel'] ?? null,
                'data' => $this->data['data'] ?? [],
            ],
            'type' => $this->type,
            'token' => $this->token,
        ];
    }
}

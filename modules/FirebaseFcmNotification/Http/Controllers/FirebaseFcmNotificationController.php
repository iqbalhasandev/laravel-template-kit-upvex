<?php

namespace Modules\FirebaseFcmNotification\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Modules\FirebaseFcmNotification\Notifications\UserNotificationFcmChannel;

class FirebaseFcmNotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function viaTopic()
    {
        $data = [
            'title' => 'demo title',
            'body' => 'demo body',
            'data' => [
                'image' => 'https://images.pexels.com/photos/12640456/pexels-photo-12640456.jpeg',
            ],
        ];
        $user = User::first();
        // \Notification::send(User::find(1), new UserNotificationFcmChannel($data, 'admin', 'topic'));
        $user->notify(new UserNotificationFcmChannel($data, 'admin', 'topic'));
    }

    /**
     * Display a listing of the resource.
     */
    public function viaToken()
    {
        $data = [
            'title' => 'demo title',
            'body' => 'demo body',
            'data' => [
                'image' => 'https://images.pexels.com/photos/12640456/pexels-photo-12640456.jpeg',
            ],
        ];
        $user = User::first();
        $user->notify(new UserNotificationFcmChannel($data, $user->fcm_token, 'token'));
    }
}

<?php

namespace Modules\FirebaseFcmNotification\Facades;

use Illuminate\Support\Facades\Facade;
use Modules\FirebaseFcmNotification\FirebaseFcmNotification as FirebaseFcmNotificationClass;

class FirebaseFcmNotification extends Facade
{
    protected static function getFacadeAccessor()
    {
        return FirebaseFcmNotificationClass::class;
    }
}

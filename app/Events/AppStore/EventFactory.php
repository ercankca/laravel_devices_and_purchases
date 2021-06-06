<?php


namespace App\Events\AppStore;

use Illuminate\Support\Str;
use App\Contracts\PurchaseEventContract;
use App\Contracts\ServerNotificationContract;

class EventFactory
{
    /**
     * @param ServerNotificationContract $notification
     * @return PurchaseEventContract
     */
    public static function create(ServerNotificationContract $notification): PurchaseEventContract
    {
        $type = $notification->getType();
        $className = "\App\Events\AppStore\\" . ucfirst(Str::camel(strtolower($type)));

        return new $className($notification);
    }
}

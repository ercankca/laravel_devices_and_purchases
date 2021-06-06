<?php


namespace App\Events\GooglePlay;

use Illuminate\Support\Str;
use Imdhemy\GooglePlay\DeveloperNotifications\SubscriptionNotification;
use App\Contracts\PurchaseEventContract;
use App\ServerNotifications\GoogleServerNotification;
use ReflectionClass;

class EventFactory
{
    /**
     * @param GoogleServerNotification $notification
     * @return PurchaseEventContract
     */
    public static function create(GoogleServerNotification $notification): PurchaseEventContract
    {
        $notificationType = $notification->getType();
        $types = (new ReflectionClass(SubscriptionNotification::class))->getConstants();
        $type = array_search($notificationType, $types);
        $className = self::getClassName($type);

        return new $className($notification);
    }

    /**
     * @param $type
     * @return string
     */
    public static function getClassName($type): string
    {
        $camelCaseName = ucfirst(Str::camel(strtolower($type)));

        return "\App\Events\GooglePlay\\" . $camelCaseName;
    }
}

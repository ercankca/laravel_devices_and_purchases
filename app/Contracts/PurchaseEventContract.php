<?php


namespace App\Contracts;

/**
 * Interface PurchaseEventContract
 * @package App\Events\Contracts
 */
interface PurchaseEventContract
{
    /**
     * @return ServerNotificationContract
     */
    public function getServerNotification(): ServerNotificationContract;
}

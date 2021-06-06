<?php


namespace App\Contracts;

use Imdhemy\AppStore\Receipts\ReceiptResponse;
use Imdhemy\GooglePlay\Subscriptions\SubscriptionPurchase;
use App\ValueObjects\Time;

/**
 * Interface SubscriptionContract
 * @package App\Events\Contracts
 */
interface SubscriptionContract
{
    /**
     * @return Time
     */
    public function getExpiryTime(): Time;

    /**
     * @return string
     */
    public function getItemId(): string;

    /**
     * @return string
     */
    public function getProvider(): string;

    /**
     * @return string
     */
    public function getUniqueIdentifier(): string;

    /**
     * @return mixed|SubscriptionPurchase|ReceiptResponse
     */
    public function getProviderRepresentation();
}

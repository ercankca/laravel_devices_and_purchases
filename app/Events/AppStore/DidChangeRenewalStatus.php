<?php


namespace App\Events\AppStore;

use App\Events\PurchaseEvent;
use App\ValueObjects\Time;

class DidChangeRenewalStatus extends PurchaseEvent
{
    /**
     * @return bool
     */
    public function isAutoRenewal(): bool
    {
        return $this->serverNotification->isAutoRenewal();
    }

    /**
     * @return Time|null
     */
    public function getAutoRenewStatusChangeDate(): ?Time
    {
        return $this->serverNotification->getAutoRenewStatusChangeDate();
    }
}

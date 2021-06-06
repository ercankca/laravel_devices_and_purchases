<?php


namespace App\Subscriptions;

use Imdhemy\AppStore\ValueObjects\ReceiptInfo;
use Imdhemy\AppStore\Receipts\ReceiptResponse as ReceiptResponse;
use App\Contracts\SubscriptionContract;
use App\ValueObjects\Time;


class AppStoreSubscription implements SubscriptionContract
{
    /**
     * @var ReceiptInfo
     */
    private $receipt;
    private $receiptString;
    private $status;
    private $expiryDate;

    /**
     * AppStoreSubscription constructor.
     * @param ReceiptInfo $receipt
     */
    public function __construct(ReceiptInfo $receipt , ReceiptResponse $receiptResponse)
    {
        $this->receipt = $receipt;
        $this->receiptString = $receiptResponse->getReceipt();
        $this->status = $receiptResponse->getStatus();
        $this->expiryDate = $this->getExpiryTime();

        $this->handleRequirements();

    }

    public function handleRequirements()
    {
        $receiptStringLastChar= substr($this->receiptString, -1);
            if ($receiptStringLastChar%2==1)
            {
                $expiryDateSet = new \DateTime($this->expiryDate, new \DateTimeZone('UTC'));
                $timezoneName = timezone_name_from_abbr("", 6*3600, false);
                $expiryDateSetModify = $expiryDateSet->setTimezone(new \DateTimezone($timezoneName));

                return response()->json([
                        "success"=>"ok",
                        "status"=> $this->status ,
                        "expire-date:"=>$expiryDateSetModify
                    ]
                );
            }
    }

    /**
     * @return Time
     */
    public function getExpiryTime(): Time
    {
        return Time::fromAppStoreTime($this->receipt->getExpiresDate());
    }

    /**
     * @return string
     */
    public function getItemId(): string
    {
        return $this->receipt->getProductId();
    }

    /**
     * @return string
     */
    public function getProvider(): string
    {
        return 'app_store';
    }

    /**
     * @return string
     */
    public function getUniqueIdentifier(): string
    {
        return $this->receipt->getOriginalTransactionId();
    }

    /**
     * @return mixed
     */
    public function getProviderRepresentation()
    {
        return $this->receipt;
    }
}

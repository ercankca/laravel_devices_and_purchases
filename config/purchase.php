<?php

use App\Events\AppStore\Cancel;
use App\Events\AppStore\DidChangeRenewalPref;
use App\Events\AppStore\DidChangeRenewalStatus;
use App\Events\AppStore\DidFailToRenew;
use App\Events\AppStore\DidRecover;
use App\Events\AppStore\DidRenew;
use App\Events\AppStore\InitialBuy;
use App\Events\AppStore\InteractiveRenewal;
use App\Events\AppStore\PriceIncreaseConsent;
use App\Events\AppStore\Refund;
use App\Events\AppStore\Revoke;
use App\Events\GooglePlay\SubscriptionCanceled;
use App\Events\GooglePlay\SubscriptionDeferred;
use App\Events\GooglePlay\SubscriptionExpired;
use App\Events\GooglePlay\SubscriptionInGracePeriod;
use App\Events\GooglePlay\SubscriptionOnHold;
use App\Events\GooglePlay\SubscriptionPaused;
use App\Events\GooglePlay\SubscriptionPauseScheduleChanged;
use App\Events\GooglePlay\SubscriptionPriceChangeConfirmed;
use App\Events\GooglePlay\SubscriptionPurchased;
use App\Events\GooglePlay\SubscriptionRecovered;
use App\Events\GooglePlay\SubscriptionRenewed;
use App\Events\GooglePlay\SubscriptionRestarted;
use App\Events\GooglePlay\SubscriptionRevoked;

return [
    'routing' => [],

    'google_play_package_name' => env('GOOGLE_PLAY_PACKAGE_NAME', 'com.example.name'),

    'appstore_password' => env('APPSTORE_PASSWORD', ''),

    'eventListeners' => [
        /**
         * --------------------------------------------------------
         * Google Play Events
         * --------------------------------------------------------
         */
        SubscriptionPurchased::class => [],
        SubscriptionRenewed::class => [],
        SubscriptionInGracePeriod::class => [],
        SubscriptionExpired::class => [],
        SubscriptionCanceled::class => [],
        SubscriptionPaused::class => [],
        SubscriptionRestarted::class => [],
        SubscriptionDeferred::class => [],
        SubscriptionRevoked::class => [],
        SubscriptionOnHold::class => [],
        SubscriptionRecovered::class => [],
        SubscriptionPauseScheduleChanged::class => [],
        SubscriptionPriceChangeConfirmed::class => [],

        /**
         * --------------------------------------------------------
         * Appstore Events
         * --------------------------------------------------------
         */
        Cancel::class => [],
        DidChangeRenewalPref::class => [],
        DidChangeRenewalStatus::class => [],
        DidFailToRenew::class => [],
        DidRecover::class => [],
        DidRenew::class => [],
        InitialBuy::class => [],
        InteractiveRenewal::class => [],
        PriceIncreaseConsent::class => [],
        Refund::class => [],
        Revoke::class => [],
    ],
];

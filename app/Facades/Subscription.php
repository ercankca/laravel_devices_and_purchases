<?php


namespace App\Facades;

use GuzzleHttp\ClientInterface;
use Illuminate\Support\Facades\Facade;

/**
 * @method static \App\Subscription googlePlay(?ClientInterface $client = null)
 * @method static \App\Subscription appStore()
 */
class Subscription extends Facade
{
    /**
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'subscription';
    }
}

<?php

namespace Emrebbozkurt\VerimorSms\Facades;

use Emrebbozkurt\VerimorSms\VerimorService;
use Illuminate\Support\Facades\Facade;

/**
 * @method static mixed send($to, $message, $params = [])
 *
 */
class Verimor extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return VerimorService::class;
    }
}

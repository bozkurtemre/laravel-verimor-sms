<?php

namespace Emrebbozkurt\VerimorSms\Facades;

use Emrebbozkurt\VerimorSms\VerimorSms;
use Illuminate\Support\Facades\Facade;

/**
 * @method static send($to, $message, $params = [])
 *
 * @see \Emrebbozkurt\VerimorSms\VerimorSms
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
        return VerimorSms::class;
    }
}

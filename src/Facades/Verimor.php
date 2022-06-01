<?php

namespace Emrebbozkurt\VerimorSms\Facades;

use Emrebbozkurt\VerimorSms\VerimorService;
use Illuminate\Support\Facades\Facade;

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

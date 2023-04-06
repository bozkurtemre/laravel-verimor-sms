<?php

namespace Emrebbozkurt\VerimorSms\Contracts;

interface VerimorSms
{
    /**
     * @param $to
     * @param $message
     * @param $params
     * @return mixed
     */
    public function send($to, $message, $params = []);

    /**
     * @return mixed
     */
    public function response();

    /**
     * @return mixed
     */
    public function status();

    /**
     * @return mixed
     */
    public function request();
}

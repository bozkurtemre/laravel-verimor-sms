<?php

    /*
     |--------------------------------------------------------------------------
     | SMS Settings
     |--------------------------------------------------------------------------
     |
     | Default user credentials are read from env but you can update it here.
     |
     */

return [
    'username' => env('VERIMOR_USERNAME', ''),
    'password' => env('VERIMOR_API_KEY', ''),
    'custom_id' => uniqid(),
    'datacoding' => '0',
    'valid_for' => '48:00',
];

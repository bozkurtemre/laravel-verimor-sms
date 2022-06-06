# Laravel Verimor SMS

[![Latest Stable Version](http://poser.pugx.org/emrebbozkurt/laravel-verimor-sms/v)](https://packagist.org/packages/emrebbozkurt/laravel-verimor-sms)
[![Total Downloads](http://poser.pugx.org/emrebbozkurt/laravel-verimor-sms/downloads)](https://packagist.org/packages/emrebbozkurt/laravel-verimor-sms)
[![Latest Unstable Version](http://poser.pugx.org/emrebbozkurt/laravel-verimor-sms/v/unstable)](https://packagist.org/packages/emrebbozkurt/laravel-verimor-sms)
[![License](http://poser.pugx.org/emrebbozkurt/laravel-verimor-sms/license)](https://packagist.org/packages/emrebbozkurt/laravel-verimor-sms)

Easy sending sms on [Verimor SMS API](https://github.com/verimor/SMS-API/).

> **NOTE:** These instructions are for the latest version of Laravel.

* [Installation](#installation)
* [Configuration](#configuration)
* [Usage](#usage)
* [Support](#support)
* [Copyright and License](#copyright-and-license)

## Installation

1. Install the package via Composer:

    ```bash
    composer require emrebbozkurt/laravel-verimor-sms
    ```

2. Publish the configuration file if you want to change any defaults:

    ```bash
    php artisan vendor:publish --provider="Emrebbozkurt\VerimorSms\VerimorServiceProvider"
    ```

## Configuration

Add this fields to .env file:

```
VERIMOR_USERNAME=908501234567
VERIMOR_API_KEY=xxxxxxx
```

You can set from verimor config file the default values for extra parameters:

```php
return [
    'username' => env('VERIMOR_USERNAME', '908501234567'),
    'password' => env('VERIMOR_API_KEY', 'xxxxxxx'),
    'custom_id' => uniqid()
    'datacoding' => '0',
    'valid_for' => '48:00',
];
```

## Usage

Simple Send:

```php
$sms = Verimor::send('+905431231234', 'Hello');
$response = $sms->response();
$status = $sms->status();
```

Send with extra parameters:

```php
$sms = Verimor::send('+905431231234', 'Hello', ['custom_id' => uniqid(), 'datacoding' => '0', 'valid_for' => '48:00']);
$response = $sms->response();
$status = $sms->status();
```

## Support

Please use [GitHub](https://github.com/emrebbozkurt/laravel-verimor-sms) for reporting bugs,
and making comments or suggestions.

## Copyright and License

[laravel-verimor-sms](https://github.com/emrebbozkurt/laravel-verimor-sms)
was written by [Emre Bozkurt](https://emrebbozkurt.github.io) and is released under the
[MIT License](LICENSE.md).

Copyright (c) 2022 Emre Bozkurt

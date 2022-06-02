<?php

namespace Emrebbozkurt\VerimorSms;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;

class VerimorService
{
    /**
     *  Config
     *
     * @return string
     */
    protected $config;

    /**
     * Sms To
     *
     * @return string
     */
    protected $to;

    /**
     * Sms Message
     *
     * @return string
     */
    protected $message;

    /**
     * Sms Parameters
     *
     * @return string
     */
    protected $params;

    /**
     * Response
     *
     * @return string
     */
    protected $response;

    /**
     * Response Status
     *
     * @return string
     */
    protected $status;

    /**
     * Constructor
     *
     */
    public function __construct($config)
    {
        $this->config = $config;
    }

    /**
     * Starting to request.
     *
     * @return VerimorService
     */
    public static function send($to, $message, $params = [])
    {
        self::$to = $to;
        self::$message = $message;
        self::$params = $params;
        return self::request();
    }

    /**
     * Returning to response
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function response()
    {
        return response()->json($this->response);
    }

    /**
     * Returning to response status
     *
     * @return string
     */
    public function status()
    {
        return $this->status;
    }

    /**
     * Sending api to request
     *
     * @return VerimorService
     */
    protected static function request()
    {
        $data = [
            'username' => self::$config['username'],
            'password' => self::$config['password'],
            'custom_id' => self::$params['custom_id'] ?? self::$config['custom_id'],
            'datacoding' => self::$params['datacoding'] ?? self::$config['datacoding'],
            'valid_for' => self::$params['valid_for'] ?? self::$config['valid_for'],
            'send_at' => Carbon::now()->toDateTimeString(),
            'messages' => [
                'msg' => self::$message,
                'dest' => self::$to
            ]
        ];

        $request = Http::post('http://sms.verimor.com.tr/v2/send.json', $data);

        self::$response = ['message' => $request->body(), 'status' => $request->status()];
        self::$status = $request->status();

        return self::class;
    }
}

<?php

namespace Emrebbozkurt\VerimorSms;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Http;
use Emrebbozkurt\VerimorSms\Contracts\VerimorSms as VerimorContract;

class VerimorSms implements VerimorContract
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
     * @return VerimorSms
     */
    public function send($to, $message, $params = [])
    {
        $this->to = $to;
        $this->message = $message;
        $this->message = $params;
        return $this->request();
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
     * @return VerimorSms
     */
    public function request()
    {
        $data = [
            'username' => $this->config['username'],
            'password' => $this->config['password'],
            'custom_id' => $this->params['custom_id'] ?? $this->config['custom_id'],
            'datacoding' => $this->params['datacoding'] ?? $this->config['datacoding'],
            'valid_for' => $this->params['valid_for'] ?? $this->config['valid_for'],
            'send_at' => Carbon::now()->toDateTimeString(),
            'messages' => [
                'msg' => $this->message,
                'dest' => $this->to
            ]
        ];

        $request = Http::post('http://sms.verimor.com.tr/v2/send.json', $data);

        $this->response = ['message' => $request->body(), 'status' => $request->status()];
        $this->status = $request->status();

        return $this;
    }
}

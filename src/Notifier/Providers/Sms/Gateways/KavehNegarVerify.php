<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 4:03 PM
 */

namespace Limito\Notifier\Providers\Sms\Gateways;

use Kavenegar\KavenegarApi;
use Log;

class KavehNegarVerify extends Gateway implements iGateway
{

    public $name = 'kavehnegar_verify';

    public $token = "";
    public $token2 = "";
    public $token3 = "";
    public $template = "";

    function token($token)
    {
        $this->token = $token;
    }

    function token2($token)
    {
        $this->token2 = $token;
    }

    function token3($token)
    {
        $this->token3 = $token;
    }

    function template($template)
    {
        $this->template = $template;
    }

    function to($to)
    {
        $this->to = $to;
    }

    function body($body)
    {
        $this->body = $body;
    }


    function send()
    {

        try {
            $api = new KavenegarApi($this->getPassword());

            $result = $api->VerifyLookup($this->to, $this->token, $this->token, $this->token3, $this->template);
            if ($result) {
                foreach ($result as $r) {
                    Log::info("Notifier====>SMS====>KavehNegarVerify====>SendResponse = " . $r->messageid . " ====>To = " . $this->to . " ====>From = " . $this->token . ' ====>Body = ' . $this->template);
                }
            }
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            //echo $e->errorMessage();
            Log::error("Notifier====>SMS====>KavehNegarVerify====>SendResponse = " . $e->getMessage() . " ====>To = " . $this->to . " ====>From = " . $this->token . ' ====>Body = ' . $this->template);
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            //echo $e->errorMessage();
            Log::error("Notifier====>SMS====>KavehNegarVerify====>SendResponse = " . $e->getMessage() . " ====>To = " . $this->to . " ====>From = " . $this->token . ' ====>Body = ' . $this->template);
        }


    }
}
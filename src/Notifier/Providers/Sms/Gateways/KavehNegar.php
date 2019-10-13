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

class KavehNegar extends Gateway implements iGateway
{

    public $name = 'kavehnegar';

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




        try{
            $api = new KavenegarApi($this->getPassword() );
            $sender = $this->getFrom();
            $message = $this->body;
            if(is_array($this->to)){
                $receptor = $this->to;
            }else{
              $receptor = array($this->to);
            }
            

            $result = $api->Send($sender,$receptor,$message);
            if($result){
                foreach($result as $r){
                    Log::info("Notifier====>SMS====>KavehNegar====>SendResponse = " . $r->messageid . " ====>To = " . json_encode($this->to) . " ====>From = " . $this->getFrom() . ' ====>Body = ' . $this->body);

                }
            }
        }
        catch(\Kavenegar\Exceptions\ApiException $e){
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            //echo $e->errorMessage();
            Log::error("Notifier====>SMS====>KavehNegar====>SendResponse = " . $e->getMessage() . " ====>To = " . json_encode($this->to)  . " ====>From = " . $this->getFrom() . ' ====>Body = ' . $this->body);
        }
        catch(\Kavenegar\Exceptions\HttpException $e){
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            //echo $e->errorMessage();
            Log::error("Notifier====>SMS====>KavehNegar====>SendResponse = " . $e->getMessage() . " ====>To = " . json_encode($this->to)  . " ====>From = " . $this->getFrom() . ' ====>Body = ' . $this->body);
        }


    }
}

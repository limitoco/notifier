<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 4:03 PM
 */

namespace Limito\Notifier\Providers\Sms\Gateways;

use Log;

class PayamResan extends Gateway implements iGateway
{

    public $name = 'payamresan';

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
            $client = new \SoapClient($this->getUrl());

            $parameters['Username'] = $this->getUserName();
            $parameters['PassWord'] = $this->getPassword();
            $parameters['SenderNumber'] = $this->getFrom();
            if (is_array($this->to))
                $parameters['RecipientNumbers'] = $this->to;
            else
                $parameters['RecipientNumbers'] = array($this->to);
            $parameters['MessageBodie'] = $this->body;
            $parameters['Type'] = 1;
            $parameters['AllowedDelay'] = 0;

            // $res = $client->GetCredit($parameters);
            // echo $res->GeCreditResult;

            $res = $client->SendMessage($parameters);
            foreach ($res->SendMessageResult as $r)
                Log::info("Notifier====>SMS====>PayamResan====>SendResponse = " . $r . " ====>To = " . $this->to . " ====>From = " . $this->getFrom() . ' ====>Body = ' . $this->body);
        } catch (\SoapFault $ex) {
            Log::error("Notifier====>SMS====>PayamResan====>SendResponse = " . $ex->faultstring . " ====>To = " . $this->to . " ====>From = " . $this->getFrom() . ' ====>Body = ' . $this->body);
            //echo $ex->faultstring;
        }
    }
}
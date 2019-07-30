<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 2:41 PM
 */

namespace Limito\Notifier\Providers\Sms;


use Limito\Notifier\iNotifier;
use Limito\Notifier\Providers\iProvider;
use Limito\Notifier\Providers\Provider;

class Sms extends Provider implements iNotifier, iProvider
{


    function to($to)
    {
        $this->to = $to;
        return $this;
    }

    function body($body)
    {
        $this->body = $body;
        return $this;
    }


    function selectGateway()
    {

        $this->gatewayClassName = config('notifier.sms.gateways.' . $this->defaultGatewayName() . '.class_name');

    }

    function defaultGatewayName()
    {
        return config('notifier.sms.setting.default');
    }

    function send()
    {
        $gateway = new $this->gatewayClassName();
        $gateway->to = $this->to;
        $gateway->body = $this->body;
        $gateway->send();
    }

}
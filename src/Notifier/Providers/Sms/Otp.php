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

class Otp extends Provider implements iNotifier, iProvider
{

    public $code, $token, $token2, $token3;
    private $template = 'verify';

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

    function code($code)
    {
        $this->code = $code;
        return $this;
    }

    function token($token)
    {
        $this->token = $token;
        return $this;
    }

    function token2($token2)
    {
        $this->token2 = $token2;
        return $this;
    }

    function token3($token3)
    {
        $this->token3 = $token3;
        return $this;
    }

    function template($template)
    {
        $this->template = $template;
    }

    function selectGateway()
    {

        $this->gatewayClassName = config('notifier.sms.gateways.' . 'kavehnegar_verify' . '.class_name');

    }

    function defaultGatewayName()
    {
        return config('notifier.sms.setting.default');
    }

    function send()
    {
        $gateway = new $this->gatewayClassName();
        $gateway->to = $this->to;
        if (empty($this->code))
            $gateway->token = $this->token;
        else
            $gateway->token = $this->code;
        $gateway->token2 = $this->token2;
        $gateway->token3 = $this->token3;
        $gateway->template = $this->template;
        $gateway->send();
    }

}

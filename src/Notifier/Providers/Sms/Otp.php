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

    public $code;
    private $temaplte = 'NoonResonVerification';

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
        $gateway->token = $this->code;
        $gateway->template = $this->temaplte;

        $gateway->send();
    }

}
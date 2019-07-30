<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 4:33 PM
 */

namespace Limito\Notifier\Providers\Sms\Gateways;


interface iGateway
{
    function to($to);

    function body($body);

    function send();
}
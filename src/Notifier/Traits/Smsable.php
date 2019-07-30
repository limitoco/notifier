<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 10/18/18
 * Time: 6:47 PM
 */

namespace Limito\Notifier\Traits;


use Limito\Notifier\Common\Sms;

trait Smsable
{

    protected $toMobile = '';
    protected $smsBody = '';


    function sendSms()
    {

            (new Sms())->body($this->smsBody)->to($this->toMobile)->send();

    }
}
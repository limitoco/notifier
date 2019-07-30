<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 10/18/18
 * Time: 6:39 PM
 */

namespace Limito\Notifier\Traits;



trait Notifiable
{

    use Smsable;
    protected $sms = true;


    function sendNotification()
    {

        if ($this->sms)
            $this->sendSms();
    }
}
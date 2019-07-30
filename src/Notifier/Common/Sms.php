<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 6:19 PM
 */

namespace Limito\Notifier\Common;

use Limito\Notifier\Notifier;
use Limito\Notifier\Providers\Sms\Sms as MainSms;


class Sms
{

    private $to, $body;


    static function Instance()
    {
        return new Sms();
    }

    /**
     * @param mixed $to
     * @return $this
     */
    public function to($to)
    {
        $this->to = $to;
        return $this;
    }

    /**
     * @param mixed $body
     * @return $this
     */
    public function body($body)
    {
        $this->body = $body;
        return $this;
    }


    public function send()
    {
        $sms = new MainSms();
        $sms->to($this->to);
        $sms->body($this->body);
        (new Notifier($sms))->send();
    }


}
<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 4:03 PM
 */

namespace Limito\Notifier\Providers\Sms\Gateways;


abstract class Gateway
{
    public $name = 'default';
    private $userName, $password, $url, $from;

    public $to, $body;

    function config()
    {

        return config('notifier.sms.gateways.' . $this->name);
    }

    /**
     * @return string
     */
    public function getName()
    {
        if ($this->name == 'default') {
            $this->name = $this->getDefaultGateway();
        }
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getUserName()
    {
        $this->userName = config('notifier.sms.gateways.' . $this->name . '.username');
        return $this->userName;

    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        $this->password = config('notifier.sms.gateways.' . $this->name . '.password');
        return $this->password;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        $this->from = config('notifier.sms.gateways.' . $this->name . '.from');
        return $this->from;
    }

    /**
     * @return mixed
     */
    public function getUrl()
    {
        $this->url = config('notifier.sms.gateways.' . $this->name . '.url');
        return $this->url;
    }


    function getDefaultGateway()
    {
        return config('notifier.sms.setting.default');
    }
}
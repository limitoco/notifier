<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 2:44 PM
 */

namespace Limito\Notifier\Providers;


abstract class Provider
{
    public $to, $body;
    public $gatewayClassName;


    function __construct()
    {
        $this->selectGateway();
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param mixed $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }


    /**
     * @return mixed
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param mixed $body
     */
    public function setBody($body)
    {
        $this->body = $body;
    }


    abstract function selectGateway();

    abstract function defaultGatewayName();
}
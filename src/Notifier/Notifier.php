<?php
/**
 * Created by PhpStorm.
 * User: mohsen1
 * Date: 9/26/18
 * Time: 2:29 PM
 */

namespace Limito\Notifier;


use Limito\Notifier\Jobs\NotifierJob;

class Notifier
{
    private $notifier;

    function __construct(iNotifier $notifier)
    {
        $this->notifier = $notifier;
    }

    function send()
    {
        NotifierJob::dispatch($this->notifier);
    }

}
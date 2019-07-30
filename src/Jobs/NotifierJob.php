<?php

namespace Limito\Notifier\Jobs;

use Limito\Notifier\iNotifier;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class NotifierJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    private $notifier;

    /**
     * Create a new job instance.
     *
     * @param iNotifier $notifier
     */
    public function __construct(iNotifier $notifier)
    {
        $this->notifier = $notifier;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->notifier->send();
    }
}

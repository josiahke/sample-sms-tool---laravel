<?php

namespace App\Listeners;

use App\Events\SmsSent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

use App\SmsLog;

class LogSendSms
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SmsSent  $event
     * @return void
     */
    public function handle(SmsSent $data)
    {
        //
        $log = new SmsLog();
        $log->fill($data->sms);
        $log->save();
        //return true ;
    }
}

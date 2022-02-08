<?php

namespace App\Listeners;

use App\Events\LoanSendToDepartments;
use App\Mail\LoanCreated;

class SendLoanCreatedNotificationToExecutors
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
     * @param  \App\Events\LoanSendToDepartments $event
     * @return void
     */
    public function handle(LoanSendToDepartments $event)
    {
        \Mail::to($event->emails)
            ->queue(new LoanCreated($event->loan)
            );
    }
}

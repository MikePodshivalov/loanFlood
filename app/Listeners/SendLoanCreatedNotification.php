<?php

namespace App\Listeners;

use App\Events\LoanCreated;
use App\Models\User;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLoanCreatedNotification
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
     * @param  \App\Events\LoanCreated  $event
     * @return void
     */
    public function handle(LoanCreated $event)
    {
        $emails = User::role('km_main')->pluck('email')->toArray();
        \Mail::to($emails)
            ->queue(new \App\Mail\LoanCreated($event->loan)
        );
    }
}

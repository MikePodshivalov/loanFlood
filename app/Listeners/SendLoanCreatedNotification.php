<?php

namespace App\Listeners;

use App\Events\LoanCreated;
use App\Models\User;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

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
        if(Auth::user()->hasAnyRole('km', 'km_main')) {
            $emails = User::role('km_main')->pluck('email')->toArray();
            \Mail::to($emails)
                ->queue(new \App\Mail\LoanCreated($event->loan)
                );
        }
    }
}

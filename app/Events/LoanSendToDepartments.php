<?php

namespace App\Events;

use App\Models\Loan;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class LoanSendToDepartments
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public Loan $loan;
    public array $emails;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Loan $loan, array $emails)
    {
        $this->loan = $loan;
        $this->emails = $emails;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}

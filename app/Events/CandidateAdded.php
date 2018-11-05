<?php

namespace App\Events;

use App\candidate;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CandidateAdded
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $candidate;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(candidate $candidate)
    {
        $this->candidate=$candidate;
    }
}

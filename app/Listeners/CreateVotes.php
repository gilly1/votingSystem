<?php

namespace App\Listeners;

use\App\kura;
use App\Events\CandidateAdded;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CreateVotes
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
     * @param  CandidateAdded  $event
     * @return void
     */
    public function handle(CandidateAdded $event)
    {
        $kura=new kura();
        $kura->votes=0;

        $event->candidate->kura()->save($kura);
    }
}

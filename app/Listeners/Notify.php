<?php

namespace App\Listeners;

use App\Events\testevent;
use App\Mail\Usermail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class Notify
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
     * @param  testevent  $event
     * @return void
     */
    public function handle(testevent $event)
    {
        \Mail::to('rahul@yopmail.com')->send(new Usermail($event));
    }
}

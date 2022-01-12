<?php

namespace App\Listeners;

use App\Events\EmployeeRegistered;
use App\Events\UserRegistered;
use App\Mail\EmployeeRegisteredMail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendRegisteredEmail
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
     * @param  \App\Events\UserRegistered  $event
     * @return void
     */
    public function handle(EmployeeRegistered $event)
    {
        Mail::to($event->employee->email)
            ->send(new EmployeeRegisteredMail($event->employee, $event->password));
    }
}

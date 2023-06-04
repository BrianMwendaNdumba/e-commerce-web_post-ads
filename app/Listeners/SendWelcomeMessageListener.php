<?php

namespace App\Listeners;

use App\Mail\WelcomeEmail;
use Illuminate\Support\Facades\Mail;
use App\Events\SendWelcomeMessage;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendWelcomeMessageListener implements ShouldQueue
{
    public function handle(SendWelcomeMessage $event)
    {
        // Access the user from the event
        $user = $event->user;

        // Send the welcome message to the user (you can use your own logic here)
        // Example: sending an email
        Mail::to($user->email)->send(new WelcomeEmail());
    }
}

<?php

namespace App\Listeners;

use App\Events\IdeasCreated;
use App\Models\User;
use App\Notifications\NewIdeasLihkg;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendIdeasCreatedNotifications implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(IdeasCreated $event): void
    {
        foreach (User::whereNot('id', $event->lihkg->user_id)->cursor() as $user) {
            $user->notify(new NewIdeasLihkg($event->lihkg));
        }
    }
}

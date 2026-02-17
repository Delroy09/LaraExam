<?php

namespace App\Listeners;

use Illuminate\Support\Facades\Log;
use App\Events\StudentRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class LogStudentRegistered
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
    public function handle(StudentRegistered $event): void
    {
        Log::info("Newly Joined Student" . $event->student->username);
    }
}

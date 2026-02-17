<?php

namespace App\Listeners;

use App\Events\StudentRegistered;
use Illuminate\Events\Dispatcher;
use Illuminate\Support\Facades\Log;

class StudentSubscriber
{
    public function handleUserRegistration(StudentRegistered $event): void
    {
        Log::info("SUBSCRIBER REPORT: " . $event->student->username . " has joined!");
    }

    public function subscribe(Dispatcher $events): void
    {
        $events->listen(
            StudentRegistered::class,
            [StudentSubscriber::class, 'handleUserRegistration']
        );
    }
}

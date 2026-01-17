<?php

namespace App\Applications\Orchestration\Listeners;

use Illuminate\Support\Facades\Event;

class RecruitmentEventListener
{
    public static function listen(): void
    {
        Event::listen(
            \App\Domains\Recruitment\Events\Candidate\EmploymentHistoryAdded::class,
            [
                \App\Applications\Orchestration\Handlers\Analytics\Candidate\LogAddedEmploymentHistory::class
            ]
        );
    }
}

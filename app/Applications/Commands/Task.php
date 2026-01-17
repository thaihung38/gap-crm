<?php

namespace App\Applications\Commands;

class Task
{
    private function log(string $action, array $data): void
    {
        new TaskEvent(action: $action, data: array_merge(['executed_user_id' => auth()->user()->id], $data))->dispatch();
    }
}

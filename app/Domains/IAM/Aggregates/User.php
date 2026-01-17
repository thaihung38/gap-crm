<?php

namespace App\Domains\IAM\Aggregates;

use App\Domains\IAM\Aggregates\User\UserRelations;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class User extends Auth
{
    use UserRelations;
    use HasUuids;
}

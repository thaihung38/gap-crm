<?php

namespace App\Infrastructure\Persistence\IAM;

use App\Domains\IAM\Aggregates\User;
use App\Domains\IAM\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Repository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends Repository implements UserRepositoryInterface
{
    protected function getModel(): Model|Builder
    {
        return new User();
    }
}

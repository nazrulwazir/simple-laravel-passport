<?php

namespace App\Repositories\User;

use App\Contracts\Repositories\UserContract;
use App\Repositories\Repository;

class UserRepository extends Repository implements UserContract
{
    /**
     * Specify Model class name.
     *
     * @return mixed
     */
    public function model()
    {
        return \App\Models\User::class;
    }
}

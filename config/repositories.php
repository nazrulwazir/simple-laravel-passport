<?php

return [

    /*
     * User Repository
     */
    [
        'when'  => 'App\Http\Controllers\API\V1\UserController',
        'needs' => 'App\Contracts\Repositories\UserContract',
        'give'  => 'App\Repositories\User\UserRepository',
    ],

];

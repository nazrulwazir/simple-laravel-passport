<?php

namespace App\Http\Controllers\Api\V1\Auth;

use Auth;
use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\V1\Auth\LoginRequest;
use App\Http\Requests\Api\V1\Auth\RegisterRequest;

class ApiAuthController extends Controller
{

    private $user;

    public function __construct(User $user){

        $this->user = $user;
    }

    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return response()->api([], __('Unauthorized'),401);
        }

        $this->user = auth()->user();

        $tokenResult = $this->user->createToken('Laravel Personal Access Client');
        $token = $tokenResult->token;

        if ($request->remember_me){
            $token->expires_at = Carbon::now()->addWeeks(1);
            $token->save();
        }

        return response()->api([
                'user'          =>  $this->user,
                'access_token'  =>  $tokenResult->accessToken,
                'token_type'    =>  'Bearer',
                'expires_at'    =>  Carbon::parse(
                    $tokenResult->token->expires_at
                )->toDateTimeString(),
        ], __('Successfully Login'));

    }

    public function register(RegisterRequest $request)
    {

        $user = $this->user->create([
            'name'      =>  $request->name,
            'email'     =>  $request->email,
            'password'  =>  bcrypt($request->password),
        ]);

        return response()->api($user, __('Successfully created user!'),201);
    }

}

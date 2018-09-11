<?php

namespace App\Providers;

use Illuminate\Support\Facades\Response as HttpResponse;
use Illuminate\Support\ServiceProvider;

class ResponseServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        HttpResponse::macro('api', function ($data = null, $message = '', $code = 200) {
            return response()->json([
                'data'    => $data,
                'message' => $message,
                'code'    => $code,
            ],$code);
        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}

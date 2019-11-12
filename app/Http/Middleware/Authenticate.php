<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Log;

class Authenticate
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    public function handle($request, Closure $next)
    {

        $user_id = session()->get(SESS_UID);
        Log::info($user_id);

        if ($user_id == '' || $user_id == null || $user_id == 0)
            return redirect('/');

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

class VerifyUserToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if($request->has('eut'))
        {
            $user = User::findByUserToken($request->get('eut'))->first();
            if($user)
                return $next($request);
        }

        flash()->error('You are not logged in');
        return redirect('/');
    }
}

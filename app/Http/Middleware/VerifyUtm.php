<?php

namespace App\Http\Middleware;


use Closure;
use App\Models\Utm;

class VerifyUtm
{

    public function handle($request, Closure $next)
    {
        $ip  = $request->ip();
        $utm = Utm::findByIp($ip)->where('source', $request->get('utm'))->first();
        if ($utm)
        {
            return $next($request);
        }
        $data = [
            'ip'     => $request->ip(),
            'source' => $request->get('utm'),
        ];
        $utm  = new Utm();
        $utm->persist($data);
        return $next($request);
    }
}

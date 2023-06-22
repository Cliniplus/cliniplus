<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Session;


class Patient
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        if (Session::has('user')) {
            if(Session()->get('user')['userType'] != 'Patient'){
                abort(401);
            }
        }else{
            return redirect(route('getPatientLogin'));
        }
        return $next($request);
    }
}

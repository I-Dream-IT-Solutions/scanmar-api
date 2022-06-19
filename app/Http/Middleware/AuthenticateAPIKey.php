<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Closure;

class AuthenticateAPIKey extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
     public $api_key = '$oVnZgwS52sJjLWxebNR44XbXFFGyOZGa';
     public function handle($request, Closure $next)
     {
         if($this->api_key == $request->input('api_key')){
           return $next($request);
         }

         return response()->json(['error'=>'Unauthorized'], 401);
     }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;
class Participante
{
    protected $auth;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

     public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }
    public function handle($request, Closure $next)
    {
        switch($this->auth->user()->rol)
            {
                case"admin":
                {
                    return redirect()->to("admin");
                    break;
                }
                case"participante":
                {
                   // return redirect()->to("participante");
                    break;
                }
            }

        return $next($request);
    }
}

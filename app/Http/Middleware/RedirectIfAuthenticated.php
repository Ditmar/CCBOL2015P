<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Guard;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($this->auth->check()) {
            //echo $this->auth->user()->rol;
            switch($this->auth->user()->rol)
            {
                case"admin":
                {
                    return redirect()->to("admin");
                    break;
                }
                case"participante":
                {
                    return redirect()->to("participante/main");
                    break;
                }
            }
           // if($this->auth->user()->rol=="admin")
            
        }

        return $next($request);
    }
}

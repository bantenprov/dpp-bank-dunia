<?php

namespace Bantenprov\DPPBankDunia\Http\Middleware;

use Closure;

/**
 * The DPPBankDuniaMiddleware class.
 *
 * @package Bantenprov\DPPBankDunia
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class DPPBankDuniaMiddleware
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
        return $next($request);
    }
}

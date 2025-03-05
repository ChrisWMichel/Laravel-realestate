<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Litespeed\LSCache\LSCacheMiddleware;

class CustomLSCacheMiddleware extends LSCacheMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, $next, ?string $lscache_control = null)
    {
        // Call the parent handle method
        return parent::handle($request, $next, $lscache_control);
    }
}

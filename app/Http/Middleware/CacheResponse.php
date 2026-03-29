<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CacheResponse
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        // Chỉ cache GET requests cho trang frontend (không phải admin)
        if ($request->isMethod('GET') && !$request->is('admin/*') && !$request->is('livewire/*')) {
            $response->headers->set('Cache-Control', 'public, max-age=300, s-maxage=600');
            $response->headers->set('Vary', 'Accept-Encoding');
        }

        return $response;
    }
}

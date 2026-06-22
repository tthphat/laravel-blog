<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response // handle là method bắt buộc của middleware. Laravel gọi method này cho mỗi request đi qua.
    {
        if(!$request->user() || $request->user()->role !== UserRole::ADMIN) {
            abort(403, 'Forbidden. Admin only');
        }

        return $next($request);
    }
}

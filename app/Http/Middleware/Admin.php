<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param \Closure(Request): (Response|RedirectResponse) $next
     * @return Response|RedirectResponse
     * @throws \Exception
     */
    public function handle(Request $request, Closure $next)
    {
        $admin = Auth::loginUsingId(1);
        if (!$admin) {
            throw new \RuntimeException('This route is protected!');//must be 401
        }
        if ($admin->user_type !== User::TYPE_ADMIN) {
            throw new \RuntimeException('You are not allowed to access this route!');//must be 403
        }
        return $next($request);
    }
}

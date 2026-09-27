<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ComingSoonMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        $comingSoon = env('COMING_SOON', false);

        // Enable developer preview
        if ($request->query('preview') === 'developer') {
            session(['developer_preview' => true]);
        }

        // Exit developer preview
        if ($request->query('preview') === 'exit') {
            session()->forget('developer_preview');

            return redirect('/');
        }

        // Developer preview
        if ($request->session()->get('developer_preview') === true) {
            return $next($request);
        }

        // Coming Soon
        if ($comingSoon) {
            return response()->view('coming-soon');
        }

        return $next($request);
    }
}
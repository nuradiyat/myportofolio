<?php

namespace App\Http\Middleware;

use App\Models\WebsiteVisitor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackWebsiteVisitor
{
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        // hanya track request GET
        if (! $request->isMethod('get')) {
            return $response;
        }

        // skip area admin / auth / filament / asset
        if (
            $request->is('admin*') ||
            $request->is('filament*') ||
            $request->is('login') ||
            $request->is('register') ||
            $request->is('logout')
        ) {
            return $response;
        }

        $ip = $request->ip();
        $today = now()->toDateString();

        $alreadyVisited = WebsiteVisitor::where('ip_address', $ip)
            ->whereDate('visit_date', $today)
            ->exists();

        if (! $alreadyVisited) {
            WebsiteVisitor::create([
                'ip_address' => $ip,
                'user_agent' => $request->userAgent(),
                'visit_date' => $today,
            ]);
        }

        return $response;
    }
}
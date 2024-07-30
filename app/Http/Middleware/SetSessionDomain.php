<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class SetSessionDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Ambil domain atau IP dari request
        $host = $request->getHost();

        // Atur domain cookie sesuai dengan host
        if ($host === 'lara-simple-livewire.artefakcoding.my.id') {
            config(['session.domain' => 'lara-simple-livewire.artefakcoding.my.id']);
        } elseif ($host === '192.168.1.2') {
            config(['session.domain' => null]); // Kosongkan untuk IP lokal
        } else {
            config(['session.domain' => null]); // Default atau domain lain jika perlu
        }

        return $next($request);
    }
}

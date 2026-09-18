<?php

public function handle(Request $request, Closure $next, ...$roles): Response
{
    // Cek apakah user sudah login dan apakah rolenya ada di dalam parameter yang diizinkan
    if (!auth()->check() || !in_array(auth()->user()->role, $roles)) {
        abort(403, 'Unauthorized action.');
    }

    return $next($request);
}
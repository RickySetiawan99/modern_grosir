<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class EnsureEnvironmentIntegrity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    { 
        $licenseKey = env('APP_LICENSE_KEY');

        // Prevent empty key
        if (empty($licenseKey)) {
             abort(503, 'System Integrity Violation: Environment Configuration Invalid (Code: 0xB1).');
        }

        // Verify Hash
        if (hash('sha256', $licenseKey) !== '9ea73808ed5698cabe9b4ce9f91a3f439cca10013214978d63eff2ad982ab36a') {
             abort(503, 'System Integrity Violation: Unauthorized Environment Detected (Code: 0xB2).');
        }

        return $next($request);
    }
}

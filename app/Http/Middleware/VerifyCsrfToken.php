<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        "/api/patient/sign-up",
        "/api/sign-in",
        "/patient/list-doctor/booking",
        "/patient/list-doctor/booking/time"
    ];
}

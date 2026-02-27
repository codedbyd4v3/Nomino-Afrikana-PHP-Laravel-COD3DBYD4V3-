<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
    'api/*', 
    'api/user/login',
    'api/user/signup',
    'api/user/*',
    'api/disc/*',
    'api/gallery/*', 
    'api/video/*',
    'api/event/*',
];
}

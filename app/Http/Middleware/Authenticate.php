<?php

declare(strict_types=1);

namespace Grocelivery\IdentityProvider\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    public function handle($request, Closure $next, ...$guards)
    {
        dd("xd");
        return parent::handle($request, $next);
    }
}
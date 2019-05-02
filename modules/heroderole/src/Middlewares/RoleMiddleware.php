<?php
/**
 * Created by PhpStorm.
 * User: binhnx
 * Date: 5/2/19
 * Time: 2:13 PM
 */

namespace Herode\Role\Middlewares;

use Closure;
use Herode\Role\Exceptions\UnauthorizedException;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        if (Auth::guest()) {
            throw UnauthorizedException::notLoggedIn();
        }

        $roles = is_array($role)
            ? $role
            : explode('|', $role);

        if (! Auth::user()->hasAnyRole($roles)) {
            throw UnauthorizedException::forRoles($roles);
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
{
    public function handle(Request $request, Closure $next, ...$allowedRole)
    {
        $user = Auth::user();

        if ($user && $this->userHasAccess($user, $allowedRole)) {
            return $next($request);
        }

        Auth::logout();
        return redirect('/');
    }

    protected function userHasAccess($user, $allowedRole)
    {
        if ($user && is_numeric($user->id_role)) {
            return in_array(intval($user->id_role), $allowedRole) || $this->checkAllowedRole(intval($user->id_role), $allowedRole);
        }

        return false;
    }

    protected function checkAllowedRole($userRole, $allowedRole)
    {
        foreach ($allowedRole as $role) {
            $limits = explode('-', $role);
            if (count($limits) === 2) {
                $min = intval($limits[0]);
                $max = intval($limits[1]);

                if ($userRole >= $min && $userRole <= $max) {
                    return true;
                }
            } elseif (intval($role) === $userRole) {
                return true;
            }
        }

        return false;
    }
}

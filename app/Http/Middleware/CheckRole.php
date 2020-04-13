<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRole
{
  /**
   * Handle an incoming request.
   *
   * @param  Request  $request
   * @param  Closure  $next
   * @param $roles
   * @return mixed
   */
  public function handle($request, Closure $next, $roles)
  {
      $roles = explode('|', $roles);
      $userRole = auth()->user()->role;

      if (in_array($userRole, $roles)){
        return $next($request);
      }

    return abort(403);
  }
}

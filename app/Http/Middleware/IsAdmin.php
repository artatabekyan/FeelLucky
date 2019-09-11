<?php
/**
 * Created by PhpStorm.
 * User: Artak Atabekyan
 * Date: 27-Feb-19
 * Time: 4:15 PM
 */

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

/**
 * Class IsAdmin
 * @package App\Http\Middleware
 */
class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        /**
         * if user is not logged in send to 404 page
         */
        if (!Auth::guard($guard)->check()) {
            abort('404');
        }
        /**
         * if user is not admin send to 404 page
         */
        if (Auth::user()->role == config('user_roles')['user']){
            abort('404');
        }


        return $next($request);
    }
}

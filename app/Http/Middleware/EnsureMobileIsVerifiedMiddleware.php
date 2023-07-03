<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Interfaces\MustVerifyMobile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class EnsureMobileIsVerifiedMiddleware
{
    public function handle(Request $request, Closure $next, $redirectToRoute = null)
    {

        $user = $request->user();
        // if (! $request->user() ||
        //     ($request->user() instanceof MustVerifyMobile &&
        //     ! $request->user()->hasVerifiedMobile())) {
        //     return $request->expectsJson()
        //             ? abort(403, 'Your mobile number is not verified.')
        //             : Redirect::guest(URL::route($redirectToRoute ?: 'verification-mobile.notice'));
        // }

        if ( $user->mobile_number && !$request->user()->hasVerifiedMobile()) {
            return $request->expectsJson()
                    ? abort(403, 'Your mobile number is not verified.')
                    : Redirect::guest(URL::route($redirectToRoute ?: 'verification-mobile.notice'));
        }

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\Models\Posts;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware

{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        $response = $next($request);
        //If the status is not approved redirect to login
        /*  if(Auth::check() && Auth::user()->'user_type:1'){
         Auth::logout();
         return redirect('/login')->withErrors('Your Account Disabled !');
        } */

        if (auth()->check() && auth()->user()->user_type == 1) {
            // Perform actions specific to user_type 0
            // For example, you can redirect or perform additional checks
            // Here, we'll just return a response for demonstration
            return redirect('/login')->withErrors('Your Account Disabled !');
        }

        $visitor = Posts::whereDate('created_at', today())
            ->where('ip_address', $request->ip())
            ->first();

        if (!$visitor) {
            Posts::create([
                'ip_address' => $request->ip(),
                'created_at' => now(),
            ]);
        }

        return $next($request);
    }
}

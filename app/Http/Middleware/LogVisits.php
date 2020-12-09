<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class LogVisits
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (null == $request->cookie('_vd')) {
            $_vid = Hash::make(Str::random(10));
            // Set the cookie to the client
            setcookie('_vd',$_vid, 60);

            // Save the visit into the logs
            $this->logVisit($_vid);
        }

        return $next($request);
    }

    private function logVisit($id)
    {
        DB::table('visitors_logs')->insert(
            ['visitor_id' => $id, 'start_visit_time' => Carbon::now(), 'end_visit_time' => Carbon::now()]
        );
    }
}

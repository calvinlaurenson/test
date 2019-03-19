<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

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
        $api_key = $request->header('api_token');

        if (!$api_key) {
            return response('Unknown API key.', 401);
        }


        $api_check = DB::table('api_keys')
            ->where('api_key', $api_key)
            ->where('active', 1)
            ->first();

        if($api_check == null) {
            return response('Incorrect API Key', 401);
        }

        if($api_check->total_calls_per_minute >= $api_check->calls_per_minute && (($api_check->time_of_last_call+60) >= time())) {
            return response('Max calls made. Try again soon', 401);
        }

        if(($api_check->time_of_last_call+60) <= time()) {
            DB::table('api_keys')
            ->where('api_key', $api_key)
            ->update(['total_calls_per_minute' => 0]);
        }

        $params = $request->route()[2];

        DB::table('api_keys')
        ->where('api_key', $api_key)
        ->increment('total_calls_per_minute', 1, ['time_of_last_call' => time()]);

        $call_id = str_random(8);
        $request->attributes->add(['call_id' => $call_id]);
        DB::table('call_log')
        ->insert(['inputs' => json_encode($params),'api_id' => $api_check->id, 'call_id' => $call_id]);

        return $next($request);
    }
}

<?php

namespace App\Http\Middleware;

use App\ApiActivity;
use Illuminate\Http\Request;

class LogActivity
{
    public function handle(Request $request, \Closure $next)
    {
        $response = $next($request);

        if ($request->user() && env('API_LOG', true)) {
            $activity = new ApiActivity();
            $activity->apiKey()->associate($request->user());
            $activity->timestamp = date('Y-m-d H:i:s');
            $activity->path = $request->path();
            $activity->save();
        }

        return $response;
    }
}

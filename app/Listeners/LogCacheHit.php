<?php

namespace App\Listeners;

use App\Events\AlunosCacheHit;
use Illuminate\Support\Facades\Cache;

class LogCacheHit
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CacheHit  $event
     * @return void
     */
    public function handle(AlunosCacheHit $event)
    {
        if( Cache::store('meta')->has('hit')){
            Cache::store('meta')->forever('hit', Cache::store('meta')->get('hit') + 1);
        } else {
            Cache::store('meta')->forever('hit', 1);
        }
    }
}

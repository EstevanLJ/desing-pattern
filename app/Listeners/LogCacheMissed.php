<?php

namespace App\Listeners;

use App\Events\AlunosCacheMissed;
use Illuminate\Support\Facades\Cache;

class LogCacheMissed
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
     * @param  CacheMissed  $event
     * @return void
     */
    public function handle(AlunosCacheMissed $event)
    {
        if( Cache::store('meta')->has('missed')){
            Cache::store('meta')->forever('missed', Cache::store('meta')->get('missed') + 1);
        } else {
            Cache::store('meta')->forever('missed', 1);
        }
    }
}

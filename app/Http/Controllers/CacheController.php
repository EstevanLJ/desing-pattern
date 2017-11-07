<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CacheController extends Controller
{
    public function flush() {
        Cache::store('file')->flush();
        Cache::store('meta')->flush();
        Cache::store('alunos')->flush();

        return response()->json();
    }

    public function info() {
        return response()->json([
            'hits' => Cache::store('meta')->get('hit', 0),
            'missed' => Cache::store('meta')->get('missed', 0)
        ]);
    }
}

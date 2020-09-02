<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class TerminalController extends Controller
{
    public function liveSetUp() {
        Artisan::call('storage:link');
        Artisan::call('config:cache');
        dd('Done');
    }
}

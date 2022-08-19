<?php

namespace App\Http\Controllers;

use App\Models\UrlShortner;
use Illuminate\Http\Request;

class UrlShow extends Controller
{
    public function index($code)
    {
        $urls = UrlShortner::where('url_code', $code)->first();
        $urls->click = $urls->click + 1;
        $urls->save();
        return redirect($urls->url_long);
    }
}

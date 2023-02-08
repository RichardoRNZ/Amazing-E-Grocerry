<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

class LanguangeController extends Controller
{
    //
    public function switchLang($lang)
    {
        if (array_key_exists($lang, Config::get('languange'))) {
            Session::put('applocale', $lang);
        }
        return redirect()->back();
    }
}

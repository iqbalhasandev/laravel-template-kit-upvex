<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function switchLang($lang)
    {
        // App::setlocale($lang);
        Session::put('locale', $lang);
        // Session::flash('success', 'Language changed successfully');
        return redirect()->back();
    }
}

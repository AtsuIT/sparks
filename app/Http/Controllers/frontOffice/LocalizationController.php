<?php

namespace App\Http\Controllers\frontOffice;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function getLang() 
    {
        return App::getLocale();
    }

    public function setLang($lang)
    {
        Session::put('lang', $lang);
        App::setLocale($lang);
        Artisan::call('optimize:clear');
        return redirect()->back();
    }
}

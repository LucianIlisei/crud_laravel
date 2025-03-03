<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\RedirectResponse;

class LanguageController extends Controller
{
    public function change($locale): RedirectResponse
    {
        if (!array_key_exists($locale, config('languages'))) {
            abort(400, 'Idioma no válido');
        }

        Session::put('locale', $locale);
        App::setLocale($locale);
        return redirect()->back();
    }
}

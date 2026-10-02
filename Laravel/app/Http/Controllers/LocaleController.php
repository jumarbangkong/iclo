<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    /**
     * Switch application locale.
     */
    public function switch(string $lang): RedirectResponse
    {
        if (in_array($lang, ['en', 'id'])) {
            Session::put('locale', $lang);
        }

        return redirect()->back();
    }
}

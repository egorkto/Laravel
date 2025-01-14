<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('auth.register');
    }
}

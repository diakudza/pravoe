<?php

namespace App\Http\Controllers;
class MainController extends Controller
{
    public function __invoke()
    {
        return view('main');
    }
}

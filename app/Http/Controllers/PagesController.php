<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('index');
    }

    public function about()
    {
        return view('about');
    }

    public function settings()
    {
        return view('settings');
    }
}

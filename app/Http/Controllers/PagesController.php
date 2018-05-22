<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;

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

    public function license()
    {
        return view('license');
    }

    public function delete(User $user) 
    {
        $user = Auth::user();
        return view ('delete')->with('user', $user);
    }
}

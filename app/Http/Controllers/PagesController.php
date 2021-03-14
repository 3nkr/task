<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth',['except'=>['about']]);
    }
    public function index()
    {

        $title= 'welcome to homepage';
        return view('pages.index')->with('title',$title);
    }
    public function about()
    {
        return view ('pages.about');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('guest:admin');
        $this->middleware('guest:editor');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        if(view()->exists($request->path())){
            return view($request->path());
        }
        return view('pages-404');
    }

    public function root()
    {
        return view('index');     
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Store;
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
    }
    public function show(){
        $stores = Store::orderBy('created_at', 'desc')->paginate(12);
        // $stores = Store::all();
        return view('pages.index', ['stores'=>$stores]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('/home');
    }
}

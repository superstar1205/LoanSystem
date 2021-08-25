<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

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

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $id=Auth::user()->id;
        $result=DB::select('SELECT * from users where id=?', [$id]);
        $flag = $result[0]->status;
        if($flag == 1){
            return redirect()->route('dashboard');
        }else{
            return view('404');
        }
    }
    public function adminHome()
    {
        return redirect()->route('manageboard');
    }
}

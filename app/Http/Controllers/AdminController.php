<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function manageboard (){
        $results = DB::select('SELECT * FROM users where is_admin!=1');
        $data = [
            'results' =>$results
        ];
        return view('adminHome')->with($data);
    }
    public function edituser(Request $request){
        $id = $request->input('id');
        $result = DB::select('SELECT * from users where id=?', [$id]);
        $data = [
            'result'=>$result,
        ];
        return view('editUser')->with($data);
    }
    public function roleuser(Request $request){
        $id = $request->input('id');
        $status = $request->input('status');
        DB::update('UPDATE users SET status = ? where id=?', [$status, $id]);
        return redirect()->route('manageboard');
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Auth;

class UserController extends Controller
{
    //
    public function addcustomer(){
        return view('addCustomer');
    }
    public function addnewcustomer(Request $request){
        $user_id = Auth::user()->id;
        print_r($user_id);
        $request->validate([
            'file' => 'required|mimes:jpg',
            'fname' => 'required|string|min:3|max:30',
            'lname' => 'required|string|min:3|max:30',
            'phone' => 'required|string|min:9|max:13',
            'address' => 'required|string|min:6|max:50',
            'idnum' => 'required|string|max:10',
        ]);
        $fname=$request->fname;
        $lname=$request->lname;
        $phone=$request->phone;
        $address=$request->address;
        $idnum=$request->idnum;
        if($request->input('gender')=='man'){
            $gender = 1;
        }else{
            $gender = 0;
        }
        $fileName = $request->fname.$request->idnum.'.'.$request->file->extension();
        $request->file->move(public_path('uploads'), $fileName);
        $image = 'uploads/'.$fileName;
        DB::insert('INSERT INTO customers (user_id, first_name, last_name, phone, address, image, idnum, gender) value(?,?,?,?,?,?,?,?)', [$user_id, $fname, $lname, $phone, $address, $image, $idnum, $gender]);
        return redirect()->route('showcustomers');
    }
    public function showcustomers (){
        $user_id = Auth::user()->id;
        $results=DB::select('SELECT * FROM(SELECT t1.*, t2.id AS trade_id, t2.paymethod, t2.amount, t2.interest, t2.payamount, t2.quota, t2.blackbarry, t2.day, t2.rent_date FROM customers t1 LEFT JOIN ( SELECT * FROM trade )t2 ON t1.id=t2.customer_id WHERE deleted=0 AND user_id=?  ) rt GROUP BY id DESC', [$user_id]);
        $data = [
            'results' =>$results
        ];
        return view('showCustomers')->with($data);
    }
    public function viewcustomer (Request $request){
        $id = $request->input('id');
        $results=DB::select('SELECT * FROM customers where id=?', [$id]);
        $data = [
            'results' =>$results
        ];
        return view('viewcustomer')->with($data);
    }
    public function delcustomer (Request $request){
        $cid=$request->input('id');
        DB::update('UPDATE customers SET deleted=1 where id=?',[$cid]);
        echo true;
    }
    public function addtrade (Request $request){
        $id = $request->input('id');
        $results=DB::select('SELECT * FROM customers where id=?', [$id]);
        $data = [
            'results' =>$results
        ];
        return view('addTrade')->with($data);
    }
    public function showtrades (){
        $user_id=Auth::user()->id;
        $results=DB::select('SELECT t1.*, t2.first_name, t2.last_name, t2.phone, t2.address, t2.idnum, t2.image FROM trade t1 LEFT JOIN ( SELECT * FROM customers WHERE deleted = "0")t2 ON t1.customer_id=t2.id WHERE t1.status = "0" AND t2.user_id=?', [$user_id]);
        $data = [
            'results' =>$results
        ];
        return view('showTrades')->with($data);
    }
    public function newtrade(Request $request){
        $customer_id=$request->input('customer_id');
        $amount = $request->input('amount');
        $method = $request->input('method');
        $interest = $request->input('interest');
        $day = $request->input('day');
        $total = $request->input('total');
        $quota = $request->input('quota');
        $rent_date = $request->input('rent_date');
        $rdate = date_create($rent_date);
        $tdate = $method." days";
        $ndate = date_add($rdate, date_interval_create_from_date_string($tdate));
        $next_date = date_format($ndate,"Y-m-d");
        $black = $request->input('black');
        DB::insert('insert into trade (customer_id, paymethod, amount, interest, payamount, quota, blackbarry, day, rent_date, next_date) values (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)', [$customer_id, $method, $amount, $interest, $total, $quota, $black, $day, $rent_date, $next_date]);
        return redirect()->route('showTrades');
    }
    public function addnewpay(Request $request){
        $id = $request->input('id');
        $results = DB::select('SELECT t1.*, t2.first_name, t2.last_name, t2.phone, t2.address, t2.idnum, t2.image FROM trade t1 LEFT JOIN ( SELECT * FROM customers WHERE deleted = "0" )t2 ON t1.customer_id=t2.id WHERE t1.id = ?', [$id]);
        $resultt = DB::select('SELECT * from pays where trade_id = ?', [$id]);
        $data = [
            'results' => $results,
            'resultt' => $resultt
        ];
        return view('addNewpay')->with($data);
    }
    public function tradepay(Request $request){
        $tid = $request->input('tid');
        $amount = $request->input('amount');
        $pa = $request->input('pa');
        $method = $request->input('method');
        $paydate = $request->input('paydate');
        DB::insert('insert into pays (trade_id, amount, paydate) values (?, ?, ?)', [$tid, $amount, $paydate]);
        $pa = $request->input('pa');
        $result = DB::select('SELECT * from trade where id=?', [$tid]);
        $og = $result[0]->ongoing;
        $ong = $og+(round($amount/$pa, 3))*100;
        $pdat = date_create($paydate);
        $tdat = $method." days";
        $ndat = date_add($pdat, date_interval_create_from_date_string($tdat));
        $next_date = date_format($ndat,"Y-m-d");
        DB::update('UPDATE trade SET ongoing = ?, next_date = ? where id =? ', [$ong, $next_date, $tid]);
        return redirect()->route('showtrades');
    }
    public function dashboard(){
        $user_id=Auth::user()->id;
        $date = Carbon::now()->format('Y-m-d');
        $result = DB::select("SELECT * FROM (SELECT * FROM trade WHERE next_date = ?) t1 LEFT JOIN (SELECT id AS c_id, user_id, image, phone, first_name, last_name, address, idnum FROM customers) t2 ON t1.customer_id = t2.c_id WHERE user_id = ?", [$date, $user_id]);
        $result1 = DB::select("SELECT * FROM (SELECT trade_id, amount AS payamt FROM pays WHERE paydate = ?)st1 LEFT JOIN (SELECT *FROM trade t1 LEFT JOIN (SELECT id AS c_id, first_name, last_name, image, user_id FROM customers )t2 ON t1.customer_id = t2.c_id)st2 ON st1.trade_id = st2.id WHERE user_id = ?", [$date, $user_id]);
        $result2 = DB::select('SELECT COUNT(id) as total FROM customers WHERE user_id = ?', [$user_id]);
        $data = [
            'result'=>$result,
            'result1'=>$result1,
            'result2'=>$result2,
        ];
        return view('home')->with($data);
    }
}

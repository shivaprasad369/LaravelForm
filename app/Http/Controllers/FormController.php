<?php

namespace App\Http\Controllers;
use Illuminate\Support\Carbon;
use Stevebauman\Location\Facades\Location;
use App\Http\Controllers\Controller;
use Carbon\Traits\Timestamp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Jenssegers\Agent\Facades\Agent;
class FormController extends Controller
{

    public function getData(request $req){
        $ip=\Request::ip();
        $var  = Carbon::now('Asia/Kolkata');

        $req->validate([
            'name'=>'required|alpha|min:4',
            'lname'=>'required|alpha|min:3',
            'phone'=>'required|digits_between:10,12|numeric',
            'email'=>'required|email',
            'password'=>'required|alpha_num|min:8|max:16',
            'confirmp'=>'required|same:password'
        ]);
        
      //  @php_ini_loaded_file('background');
        $data=DB::table('registrations')
        ->insert([
            'name'=>$req->name,
            'lname'=>$req->lname,
            'phone'=>$req->phone,
            'email'=> $req->email,
            'password'=> $req->password,
            'Os'=> Agent::platform(),
            'Browser'=> Agent::browser(),
            'mac'=> exec('getMac'),
            'ip'=>\Request::ip(),
            'date'=>$var->toDateTime(),
          

        ]);
        return redirect()->route('home');
    }
    public function details(Request $req){

        $res=DB::table('registrations')
        ->where([['email','=',$req->email],['password','=',$req->password]])->get();
        if($res){
            return view('details',['data'=>$res]);
        }
        else{
            return "<h1>You not registered</h1>";
        }
    }

}

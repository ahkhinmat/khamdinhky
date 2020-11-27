<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class HomeController extends Controller
{
    public function AuthenLogin(){
        $user_id=Session::get('user_id');
        if($user_id){
            return Redirect::to('dashboard');
        }else{
           return  Redirect::to('login')->send();
        }
    }
 
    public function index(){
        $this->AuthenLogin();
        
        return  view('dashboard');
    }
    public function login(){
       // $this->AuthenLogin();
        return  view('login');
    }
    public function postlogin(Request $request){
       $user_mayte=$request->user_mayte;
       $user_password=($request->user_password);      
       $result=DB::table('ksk_users')
       ->join('ksk_dm_benhnhan','ksk_dm_benhnhan.MaYte','=','ksk_users.MaYte')
       ->where('ksk_users.MaYte',$user_mayte)->where('ksk_users.MatKhau',$user_password)->first();
       if($result){
            session_start();
           Session::put('user_mayte',$result->MaYte);
           Session::put('user_id',$result->user_id);
           Session::put('user_name',$result->TenBenhNhan);
           return view('dashboard')->with('user_info', $result);
       }
       else{
           Session::put('message','Mật khẩu hoặc tài khoản ko đúng');
           return  Redirect::to('/login');
       }
      
    }
    public function logout(Request $request){
        Session::put('user_mayte',null);
        Session::put('user_id',null);
        return  Redirect::to('/login');
    }
}

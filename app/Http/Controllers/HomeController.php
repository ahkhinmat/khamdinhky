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
        $BenhNhan_Id=Session::get('BenhNhan_Id');
        $result_thongtin=DB::select('call  get_thongtinchung (?)',array( $BenhNhan_Id));
        return  view('dashboard')->with('user_thongtin_chung', $result_thongtin);
    }
    public function login(){
       // $this->AuthenLogin();
        return  view('login');
    }
    public function postlogin(Request $request){

       $user_mayte=$request->user_mayte;
       $user_password=($request->user_password);
      $result=DB::select('call  get_login_infor (?,?)',array(  $user_mayte, $user_password));
       if($result){
            session_start();
            if($result[0]->MaYte=='admin'){
                Session::put('user_id_admin',$result[0]->MaYte);
                return view('admin.layoutadmin');
            }else{
                Session::put('user_mayte',$result[0]->MaYte);
                Session::put('user_id',$result[0]->user_id);
                Session::put('user_name',$result[0]->TenBenhNhan);
                Session::put('BenhNhan_Id',$result[0]->BenhNhan_Id);
                Session::put('TenBenhNhan',$result[0]->TenBenhNhan);
                Session::put('NgaySinh',$result[0]->NgaySinh);
                Session::put('DiaChi',$result[0]->DiaChi);
                Session::put('Gioi',$result[0]->Gioi);
                Session::put('SoDienThoai',$result[0]->SoDienThoai);
                $result_thongtin=DB::select('call  get_thongtinchung (?)',array($result[0]->BenhNhan_Id));
              
                return view('dashboard')->with('user_info', $result[0])->with('user_thongtin_chung', $result_thongtin);
            
            }
       }
       else{
           Session::put('message','Mật khẩu hoặc tài khoản ko đúng');
           return  Redirect::to('/login');
       }
      
    }
    public function logout(Request $request){
        Session::put('user_mayte',null);
        Session::put('user_id',null);
        Session::put('user_id_admin',null);
        return  Redirect::to('/login');
    }
    public function userprofile(){
      return view('pages.userprofile');
    }
}

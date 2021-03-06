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
                Session::put('MatKhauMacDinh',$result[0]->MatKhauMacDinh);
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
          
                if($result[0]->DoiMatKhau==0){
                    //return  Redirect::to('/changepass');
                   return  view('changepass')->with('doimatkhau',$result[0]->DoiMatKhau);
                    Session::put('message','Đây là lần đầu bạn đăng nhập vui lòng đổi mật khẩu');
                }else{
                    $result_thongtin=DB::select('call  get_thongtinchung (?)',array($result[0]->BenhNhan_Id));
                    Session::put('thongtin_chung',$result_thongtin);
                    return view('dashboard')->with('user_info', $result[0])->with('user_thongtin_chung', $result_thongtin);
                }
       
            }
       }
       else{
           Session::put('message','Mật khẩu hoặc tài khoản không đúng');
           return  Redirect::to('/login');
       }
      
    }
    public function changepass(Request $request){
        $result=DB::select('call  get_login_infor (?,?)',array( Session::get('user_mayte'), $request->user_password));
        if($result){
            $data=array();
            $data['MatKhau']=$request->user_password_new;
            $data['DoiMatKhau']=1;
            DB::table('ksk_users')->where('MaYte',Session::get('user_mayte'))->update($data);
            return view('dashboard');
        }else{
            return  view('changepass');
            Session::put('message','Sai mật khẩu');
        }
        // DB::table('ksk_users')->where('MaYte',$value['MaYte'])->update($data2);
        //  dd($request->user_password);
    }
    public function lienhe(){
        $thongtin_lienhe= DB::select('call get_lienhe');
        //dd( $thongtin_lienhe);
        return  view('pages.lienhe')->with('thongtin_lienhe', $thongtin_lienhe);
    }
    public function logout(Request $request){
        Session::put('user_mayte',null);
        Session::put('user_id',null);
        Session::put('user_id_admin',null);
        Session::put('thongtin_chung',null);
        return  Redirect::to('/login');
    }
    public function userprofile(){
      return view('pages.userprofile');
    }
}

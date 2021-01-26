<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function goitinnhan($noidung,$cellphone){
        $curl = curl_init();
        curl_setopt_array($curl, array(
          CURLOPT_URL => 'http://113.185.0.35:8888/smsmarketing/api',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{
            "RQST": {
                "name": "send_sms_list",
                "REQID": "1",
                "LABELID": "141088",
                "CONTRACTTYPEID": "1",
                "CONTRACTID": "13023",
                "TEMPLATEID": "685234",
                "PARAMS": [
                    {
                        "NUM": "1",
                        "CONTENT": "'.$noidung.'"
                    }
                ],
                "encoding": "8" ,
                "SCHEDULETIME": "",
                "MOBILELIST": "'.$cellphone.'",
                "ISTELCOSUB": "0",
                "AGENTID": "121",
                "APIUSER": "bvhoanmydn",
                "APIPASS": "bvhoanmy@999",
                "USERNAME": "DN_CS"
            }
        }',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'charset: UTF-8',
            'Cookie: JSESSIONID=6712CF5156E4BF0A655CCDE287DBA5DF'
          ),
        ));
        
        $response = curl_exec($curl);
        
        curl_close($curl);
        return $response;
         

    }
    public function show_listSMS_json(){

     $ls_hopdong= DB::select('call get_listhopdong');
     
        return response($ls_hopdong);
    }
    public function show_benhnhan_byhopdong($hopdong_id){
       $ls_benhnhan=DB::select('call  get_benhnhan_byhopdong (?)',array( $hopdong_id));
       return response($ls_benhnhan);
    }
    public function show_listsms(){
        $user_id_admin=Session::get('user_id_admin');
        if($user_id_admin){
            return view('admin.listsms');
        }else{
            return  Redirect::to('login');
        }
        return view('admin.listsms');
    }
    public  static function validateCellphone($cellphone){
        $trave='';
       //  $cellphone='0905.294.022';
        $partern = '*[.]*';
        $replacement = '';
        // xóa dấu chấm 
        $trave= preg_replace($partern, $replacement, $cellphone);
        // xóa dấu chấm 
        // xóa số 0 thay bằng 84
        if(substr($trave, 0,1)=="0"){
            $trave='84'.substr($trave, 1);  
        }else{
            $trave='84'.$trave;
        }
        return  $trave;
    }
    public function randomPassword() {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 7; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    
    public function sendSmsContent(Request $request){
        $matkhau_random='';
        $noidung=$request['noidungSms'];
        $hopdong_id=$request['hopdong_id'];
        $i=0;
        foreach ($request['listPhone'] as $value) {
           $i++;
            if($value["SoDienThoai"]){
                $matkhau_random=AdminController::randomPassword();
                $noidung_sms= $noidung.'. Truy cap ket qua kham benh tai https://khamdinhky.hoanmydanang.com , tai khoan: '. $value['MaYte'].
                ' mat khau: '. $matkhau_random;
                $ketqua=   AdminController::goitinnhan( $noidung_sms,AdminController::validateCellphone($value["SoDienThoai"]));
                //ghi log kết quả gởi tin nhắn vào Database
                $data=array();
                $data['sodienthoai']=$value["SoDienThoai"];
                $data['mayte']=$value['MaYte'];
                $data['ketquasms']= $ketqua;
                $data['noidungsms']=  $noidung_sms;
                $data['trangthaisms']= '';
                $pos = strpos( $ketqua, 'success');
                if ($pos === false) {
                    $data['trangthaisms']='gởi lỗi';
                }else{
                    $data['trangthaisms']='thành công';
                }
                $data['hopdong_id']=  $hopdong_id;
                DB::table('sms_log')->insert($data);
                  //ghi log kết quả gởi tin nhắn vào Database
                  
                //cập nhật mật khẩu random vào DB
                $data2=array();
                $data2['MatKhau']=$matkhau_random;
                DB::table('ksk_users')->where('MaYte',$value['MaYte'])->update($data2);
                //cập nhật mật khẩu random vào DB
               // echo(  $i.'-'.$value['MaYte'].' sodienthoai '.($value["SoDienThoai"]).'<br>') ;
            }else{
                $data=array();
                $data['sodienthoai']=$value["SoDienThoai"];
                $data['mayte']=$value['MaYte'];
                $data['ketquasms']= 'không có số điện thoại';
                $data['trangthaisms']='chưa gởi được';
                $data['hopdong_id']=  $hopdong_id;
                DB::table('sms_log')->insert($data);
               // echo($i.'-'.$value['MaYte'].'--null--'. $value['SoDienThoai'].'<br>');
            }
        }
    }
    public function AuthenLoginAdmin(){
        $user_id_admin=Session::get('user_id_admin');
        if($user_id_admin){
            return view('admin.layoutadmin');
        }else{
            return  Redirect::to('login');
        }
    }
    public function index()
    { 
        return $this->AuthenLoginAdmin();
        //return view('admin.layoutadmin');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

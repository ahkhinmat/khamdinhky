<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
//use Symfony\Component\HttpFoundation\Response;
use DB;
//use Spatie\ArrayToXml\ArrayToXml;

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
        return view('admin.listsms');
    }
    public  static function validateCellphone($cellphone){
        $trave='';
        //kiểm tra kí tự đầu tiên có số không thì cắt đi và thay thế bằng 84
      if(substr($cellphone, 0,1)=="0"){
        $trave='84'.substr($cellphone, 1);  
      } else{
        $trave=$cellphone;
      } 
        return  $trave;
    }
    public function sendSmsContent(Request $request){
        $noidung=$request['noidungSms'];
        $hopdong_id=$request['hopdong_id'];
        $i=0;
        foreach ($request['listPhone'] as $value) {
           $i++;
            if($value["SoDienThoai"]){
                $ketqua=   AdminController::goitinnhan( $noidung,AdminController::validateCellphone($value["SoDienThoai"]));
                //ghi log kết quả gởi tin nhắn vào Database
                $data=array();
                $data['sodienthoai']=$value["SoDienThoai"];
                $data['mayte']=$value['MaYte'];
                $data['ketquasms']= $ketqua;
                $data['noidungsms']=  $noidung;
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
               // echo(  $i.'-'.$value['MaYte'].' sodienthoai '.($value["SoDienThoai"]).'<br>') ;
            }else{
                $data=array();
                $data['sodienthoai']=$value["SoDienThoai"];
                $data['mayte']=$value['MaYte'];
                $data['ketquasms']= 'null phone';
                $data['trangthaisms']='chưa gởi';
                $data['hopdong_id']=  $hopdong_id;
                DB::table('sms_log')->insert($data);
               // echo($i.'-'.$value['MaYte'].'--null--'. $value['SoDienThoai'].'<br>');
            }
        }
    }
    public function index()
    {
        return view('admin.layoutadmin');
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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
class XetNghiemController extends Controller
{
    public function AuthenLogin(){
        $user_id=Session::get('user_id');
        if($user_id){
            return Redirect::to('dashboard');
        }else{
           return  Redirect::to('login')->send();
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->AuthenLogin();
        $BenhNhan_Id=Session::get('BenhNhan_Id');
        $kq_xnbn= DB::table('ksk_ketqua_xetnghiem')->where('BenhNhan_Id', $BenhNhan_Id)
        ->orderby( 'NgayGioThucHien','desc')
        ->orderby( 'DichVu_Id','desc')->get();
       // return view('pages.xetnghiem.ketquaxetnghiem')->with('kq_xnbn',$kq_xnbn);
        return view('pages.xetnghiem')->with('kq_xnbn',$kq_xnbn);
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

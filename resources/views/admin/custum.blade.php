<?php  
    // $user_id=Session::get('user_id');
    // $user_mayte=Session::get('user_mayte');
    // $user_name=Session::get('user_name');
    // $TenBenhNhan=Session::get('TenBenhNhan');
    // $NgaySinh=date('d/m/Y', strtotime(Session::get('NgaySinh')));
    // $DiaChi=Session::get('DiaChi');
    // $Gioi=Session::get('Gioi');
    // $Email=Session::get('Email');
    // $SoDienThoai=Session::get('SoDienThoai');
    
 ?>
@extends('admin.layoutadmin')
@section('contentadmin')
<div class="page-inner">
    <form id="myform" action="{{URL::TO('/custum')}}" method="post">
        {{ csrf_field() }}
    <h4 class="page-title">Tùy biến nội dung hệ thống</h4>
        <div class="row">
            <div class="col-md-12">
                <div class="card card-with-nav">
                        <div class="card-header">
                            <div class="row row-nav-line">
                                <ul class="nav nav-tabs nav-line nav-color-secondary" role="tablist">
                                    <li class="nav-item"> <a class="nav-link active show" data-toggle="tab" href="#home" role="tab" aria-selected="true">Thông tin</a> </li>
                                </ul>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Người liên hệ</label>
                                    <input type="text" class="form-control" name="TenLienHe" placeholder="Người liên hệ" value="{{$thongtin_lienhe[0]->TenLienHe??'-'}}" >
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group form-group-default">
                                        <label>Điện thoại</label>
                                    <input type="text" class="form-control" name="Phone" placeholder="Điện thoại" value="{{$thongtin_lienhe[0]->Phone??'-'}}" >
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-4">
                                    <div class="form-group form-group-default">
                                        <label>Chuyên khoa</label>
                                    <input type="text" class="form-control" id="NoiDung" name="NoiDung" value="{{$thongtin_lienhe[0]->NoiDung??'-'}}" placeholder="Nội dung chuyên khoa" >
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
            <div class="form-action mb-3">
                <input class="btn btn-primary btn-rounded btn-login login" type="submit" value="Lưu" name="save">
          
            </div>
         </div>
    </form>
</div>

@endsection
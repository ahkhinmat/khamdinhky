<?php  
    $user_id=Session::get('user_id');
    $user_mayte=Session::get('user_mayte');
    $user_name=Session::get('user_name');
    $TenBenhNhan=Session::get('TenBenhNhan');
    $NgaySinh=date('d/m/Y', strtotime(Session::get('NgaySinh')));
    $DiaChi=Session::get('DiaChi');
    $Gioi=Session::get('Gioi');
    $Email=Session::get('Email');
    $SoDienThoai=Session::get('SoDienThoai');
    
 ?>
@extends('layout')
@section('content')
<div class="page-inner">
    <h4 class="page-title">Thông tin cá nhân</h4>
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
                                <label>Họ tên</label>
                            <input type="text" class="form-control" name="name" placeholder="Name" value="{{$TenBenhNhan}}">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-default">
                                <label>Email</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{empty($Email)?'-':$Email}}">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Ngày sinh</label>
                            <input type="text" class="form-control" id="datepicker" name="datepicker" value="{{$NgaySinh}}" placeholder="Birth Date">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Giới</label>
                                    <input type="text" class="form-control" id="Gioi" name="Gioi" value="{{$Gioi}}" placeholder="Gioi">
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group form-group-default">
                                <label>Điện thoại</label>
                            <input type="text" class="form-control" value="{{empty($SoDienThoai) ? '-':$SoDienThoai}}" name="phone" placeholder="Phone">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Địa chỉ</label>
                            <input type="text" class="form-control" value="{{$DiaChi}}" name="address" placeholder="Address">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3 mb-1">
                        <div class="col-md-12">
                            <div class="form-group form-group-default">
                                <label>Khác</label>
                                <textarea class="form-control" name="about" placeholder="Thông tin khác" rows="3"></textarea>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="text-right mt-3 mb-3">
                        <button class="btn btn-success">Save</button>
                        <button class="btn btn-danger">Reset</button>
                    </div> --}}
                </div>
            </div>
        </div>
        {{-- <div class="col-md-4">
            <div class="card card-profile card-secondary">
                <div class="card-header" style="background-image: url('../assets/img/blogpost.jpg')">
                    <div class="profile-picture">
                        <div class="avatar avatar-xl">
                            <img src="../assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-profile text-center">
                        <div class="name">Hizrian, 19</div>
                        <div class="job">Frontend Developer</div>
                        <div class="desc">A man who hates loneliness</div>
                        <div class="social-media">
                            <a class="btn btn-info btn-twitter btn-sm btn-link" href="#"> 
                                <span class="btn-label just-icon"><i class="flaticon-twitter"></i> </span>
                            </a>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                <span class="btn-label just-icon"><i class="flaticon-google-plus"></i> </span> 
                            </a>
                            <a class="btn btn-primary btn-sm btn-link" rel="publisher" href="#"> 
                                <span class="btn-label just-icon"><i class="flaticon-facebook"></i> </span> 
                            </a>
                            <a class="btn btn-danger btn-sm btn-link" rel="publisher" href="#"> 
                                <span class="btn-label just-icon"><i class="flaticon-dribbble"></i> </span> 
                            </a>
                        </div>
                        <div class="view-profile">
                            <a href="#" class="btn btn-secondary btn-block">View Full Profile</a>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="row user-stats text-center">
                        <div class="col">
                            <div class="number">125</div>
                            <div class="title">Post</div>
                        </div>
                        <div class="col">
                            <div class="number">25K</div>
                            <div class="title">Followers</div>
                        </div>
                        <div class="col">
                            <div class="number">134</div>
                            <div class="title">Following</div>
                        </div>
                    </div>
                </div>
            </div>
        </div> --}}
    </div>
</div>

@endsection
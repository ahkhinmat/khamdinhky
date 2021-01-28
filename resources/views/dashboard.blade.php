@extends('layout')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title">Thông tin chung</h4>
        <div class="btn-group btn-group-page-header ml-auto">
            <button type="button" class="btn btn-light btn-round btn-page-header-dropdown dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-ellipsis-h"></i>
            </button>
            <div class="dropdown-menu">
                <div class="arrow"></div>
                <a class="dropdown-item"  href="{{URL::to('/tuvan')}}">Tư vấn</a>
                <a class="dropdown-item" href="{{URL::to('/khambenh')}}">Khám chuyên khoa</a>
                <a class="dropdown-item" href="{{URL::to('/xetnghiem')}}">Xét nghiệm</a>
                <a class="dropdown-item" href="{{URL::to('/chandoanhinhanh')}}">Chẩn đoán hình ảnh</a>
                <a class="dropdown-item" href="{{URL::to('/thuoc')}}">Thuốc</a>
                <a class="dropdown-item" href="{{URL::to('/lienhe')}}">Liên hệ</a>
                <div class="dropdown-divider"></div>
              
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <a  href="{{URL::to('/tuvan')}}">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="la flaticon-chat-8"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Tư vấn</p>
                                    {{-- <h4 class="card-title">{{$user_thongtin_chung[0]->SoLanHopDong}}</h4> --}}
                                </div>
                            </div>
                         </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <a href="{{URL::to('/khambenh')}}">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-newspaper"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Khám chuyên khoa</p>
                                    {{-- <h4 class="card-title">{{$user_thongtin_chung[0]->SoLanKham}}</h4> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <a href="{{URL::to('/xetnghiem')}}">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="far fa-chart-bar"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Xét nghiệm</p>
                                    {{-- <h4 class="card-title">{{$user_thongtin_chung[0]->SoDvXn}}</h4> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <a href="{{URL::to('/chandoanhinhanh')}}">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="flaticon-photo-camera"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Chẩn đoán hình ảnh</p>
                                    {{-- <h4 class="card-title">{{$user_thongtin_chung[0]->SoDvCDHA}}</h4> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <a href="{{URL::to('/thuoc')}}">
                            <div class="col-icon">
                                <div class="icon-big text-center icon-success bubble-shadow-small">
                                    <i class="la flaticon-chain"></i>
                                </div>
                            </div>
                            <div class="col col-stats ml-3 ml-sm-0">
                                <div class="numbers">
                                    <p class="card-category">Thuốc</p>
                                    {{-- <h4 class="card-title">{{$user_thongtin_chung[0]->SoDvCDHA}}</h4> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
    </div>
 
 

</div>
@endsection
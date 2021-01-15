@extends('layout')
@section('content')
<div class="page-inner">
  <div class="page-header">
      <h4 class="page-title"> KẾT QUẢ TƯ VẤN</h4>
  </div>

  <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    Khám thể lực
                </div>
            </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body ">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-primary bubble-shadow-small">
                                <i class="fas fa-child"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Chiều cao</p>
                                <h4 class="card-title">    
                                    {{ ($kq_xnbn[0]->ChieuCao) }}cm
                                    </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-info bubble-shadow-small">
                                <i class="fas fa-weight"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Cân nặng</p>
                            <h4 class="card-title">    
                                {{ ($kq_xnbn[0]->CanNang)}}kg
                                </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-success bubble-shadow-small">
                                <i class="far fa-chart-bar"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">BMI&nbsp;&nbsp;</p>
                                <h4 class="card-title">    
                                    {{ ($kq_xnbn[0]->BMI) }}
                                    </h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-warning bubble-shadow-small">
                                <i class="fas fa-signature"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Mạch</p>
                                <h4 class="card-title"> {{ ($kq_xnbn[0]->Mach) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-default bubble-shadow-small">
                                <i class="fas fa-burn"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Huyết Áp</p>
                                <h4 class="card-title">    {{ $kq_xnbn[0]->HuyetAp }}</h4>

                              
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-2">
            <div class="card card-stats card-round">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-icon">
                            <div class="icon-big text-center icon-danger bubble-shadow-small">
                                <i class="fas fa-exclamation"></i>
                            </div>
                        </div>
                        <div class="col col-stats ml-3 ml-sm-0">
                            <div class="numbers">
                                <p class="card-category">Phân loại thể lực</p>
                                <h4 class="card-title">Loại  {{ ($kq_xnbn[0]->PhanLoaiSucKhoe) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   
    
  </div>
    <div class="col-md-12"><strong> Tư vấn: </strong> {{ ($kq_xnbn[0]->KetLuan_Text) }}</div>
    <div class="col-md-12"><strong>Bất thường: </strong> {{ ($kq_xnbn[0]->NhanXet_Text) }}</div>
    <div class="col-md-12"><strong>Xếp loại:  {{ ($kq_xnbn[0]->XepLoai) }}</strong></div>
</div>
@endsection
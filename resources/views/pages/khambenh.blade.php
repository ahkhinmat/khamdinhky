
@extends('layout')
@section('content')
<script>
    $( document ).ready(function() {
        console.log( "ready!" );
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="page-title">KẾT QUẢ KHÁM BỆNH</h4>
             
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                    @foreach ($kq_cdha as $item)
                    
                    <li class="nav-item">
                    <a class="nav-link " id="pills-{{ $item->Autoid}}-tab" 
                        data-toggle="pill" href="#pills-{{ $item->Autoid}}" role="tab" aria-controls="pills-{{ $item->Autoid}}" aria-selected="false">
                        {{ $item->TenDichVu}}</a>
                    </li>
                    @endforeach

                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    @foreach ($kq_cdha as $item)
                <div class="tab-pane fade show " id="pills-{{ $item->Autoid}}" role="tabpanel" aria-labelledby="pills-{{$item->Autoid}}-tab">
                    <h3 style=" color:blue">{{$item->TenDichVu}} (ngày {{ date('d/m/y', strtotime($item->NgayKetQua))}})</h3>
                        <p>
                            
                            <?php
                        if(!empty(json_decode($item->JsonKetqua)->{"dataKQ"})){
                            $mangMota = json_decode($item->JsonKetqua)->{"dataKQ"};
                            $count=count($mangMota);
                            foreach ($mangMota as $value) {
                                //echo( $value->NoiDungKham. "  ".(empty($value->Kham)?'--':' '.($value->Kham)));
                                    echo ("<strong>".$value->NoiDungKham."</strong>");
                                    echo (empty($value->Kham)?'--':' '."<i>".($value->Kham)."</i>"."<br>");
                                //  echo  ($value->KetLuan."<br>");

                            }
                          }
                  
                  
                        // for ($x = 0; $x  < $count; $x++) {
                        // print_r  ($mangMota[0]);
                        // }
                        ?>
                          <p></p>
                        {{-- </p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"KyThuat_ThuThuat"}[0]))?'':'Kỹ thuật: '.(json_decode($item->JsonKetqua)->{"KyThuat_ThuThuat"}[0])}}</p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"DeNghi_GhiChu"}[0]))?'':'Đề nghị: '.(json_decode($item->JsonKetqua)->{"DeNghi_GhiChu"}[0])}}</p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"KetLuan"}[0]))?'':'Kết luận: '.(json_decode($item->JsonKetqua)->{"KetLuan"}[0])}}</p>
                        <p>Ngày kết quả : {{ date('d/m/y', strtotime($item->NgayKetQua))}}</p> --}}
                     
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

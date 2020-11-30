
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
                <h4 class="card-title">Kết quả chẩn đoán hình ảnh</h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist">
                    @foreach ($kq_cdha as $item)
                    
                    <li class="nav-item">
                    <a class="nav-link " id="pills-{{ $item->Autoid}}-tab" 
                        data-toggle="pill" href="#pills-{{ $item->Autoid}}" role="tab" aria-controls="pills-{{ $item->Autoid}}" aria-selected="false">
                        {{ $item->TenNhomDichVu}}</a>
                    </li>
                    @endforeach
                    {{-- <li class="nav-item">
                        <a class="nav-link " id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="false">X-Quang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Điện tim</a>
                    </li>  
                      <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Điện não</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-contact-tab" data-toggle="pill" href="#pills-contact" role="tab" aria-controls="pills-contact" aria-selected="false">Nội soi</a>
                    </li> --}}
                
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    @foreach ($kq_cdha as $item)
                <div class="tab-pane fade show " id="pills-{{ $item->Autoid}}" role="tabpanel" aria-labelledby="pills-{{$item->Autoid}}-tab">
                    <h3 style=" color:blue">{{$item->TenDichVu}}</h3>
                        <p><?php
                        $mangMota = json_decode($item->JsonKetqua)->{"MoTa"};
                        $count=count ($mangMota);
                        for ($x = 0; $x  < $count; $x++) {
                        echo  ($mangMota[$x]."<br>");
                        }

                        // echo empty((json_decode($item->JsonKetqua)
                        // ->{"MoTa"}[0]))?'':'Mô tả: '.(json_decode($item->JsonKetqua)->{"MoTa"}[0]);
                        ?>
                        </p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"KyThuat_ThuThuat"}[0]))?'':'Kỹ thuật: '.(json_decode($item->JsonKetqua)->{"KyThuat_ThuThuat"}[0])}}</p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"DeNghi_GhiChu"}[0]))?'':'Đề nghị: '.(json_decode($item->JsonKetqua)->{"DeNghi_GhiChu"}[0])}}</p>
                        <p>{{empty((json_decode($item->JsonKetqua)
                        ->{"KetLuan"}[0]))?'':'Kết luận: '.(json_decode($item->JsonKetqua)->{"KetLuan"}[0])}}</p>
                        <p>Ngày kết quả : {{ date('d/m/y', strtotime($item->NgayKetQua))}}</p>
                     
                    </div>
                    @endforeach
                   
                    {{-- <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <p>Even the all-powerful Pointing has no control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name of Lorem Ipsum decided to leave for the far World of Grammar.</p>
                        <p>The Big Oxmox advised her not to do so, because there were thousands of bad Commas, wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way.
                        </p>
                    </div>
                    <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <p>Pityful a rethoric question ran over her cheek, then she continued her way. On her way she met a copy. The copy warned the Little Blind Text, that where it came from it would have been rewritten a thousand times and everything that was left from its origin would be the word "and" and the Little Blind Text should turn around and return to its own, safe country.</p>

                        <p> But nothing the copy said could convince her and so it didn’t take long until a few insidious Copy Writers ambushed her, made her drunk with Longe and Parole and dragged her into their agency, where they abused her for their</p>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

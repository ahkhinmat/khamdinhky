
@extends('layout')
@section('content')

<script>
    $( document ).ready(function() {
        console.log( "ready!" );

    });
    $('.carousel').carousel({
    interval: 100
    });
</script>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="page-title">KẾT QUẢ CHẨN ĐOÁN HÌNH ẢNH</h4>
             
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
                </ul>
                <div class="tab-content mt-2 mb-3" id="pills-tabContent">
                    {{-- {{dd($kq_cdha)}} --}}
                    @foreach ($kq_cdha as $item)
                <div class="tab-pane fade show " id="pills-{{ $item->Autoid}}" role="tabpanel" aria-labelledby="pills-{{$item->Autoid}}-tab">
                    <h3 style=" color:rgb(8, 99, 18)">{{$item->TenDichVu}} ngày {{ date('d/m/y', strtotime($item->NgayKetQua))}}</h3>
                        <p><?php
                        $mangMota = json_decode($item->JsonKetqua)->{"MoTa"};
                        $count=count ($mangMota);
                        for ($x = 0; $x  < $count; $x++) {
                        echo  ($mangMota[$x]."<br>");
                        }?>
                         </p>
                     <?php
                      if(!empty(json_decode($item->JsonKetqua)->{"Images"})){
                        ?>
                          <div id="carouselExampleIndicators{{ $item->Autoid}}" class="carousel slide mt-1" data-ride="carousel">
                            <ol class="carousel-indicators">
                       
                        <?php
                        $mangImages = json_decode($item->JsonKetqua)->{"Images"};
                        $count2=count ($mangImages);
                        for ($y = 0; $y  < $count2; $y++) { 
                          if($y==0){
                            echo '<li data-target="#carouselExampleIndicators'. $item->Autoid.'" data-slide-to="'.$y.'" class="active"></li>';
                          }else{
                          echo '<li data-target="#carouselExampleIndicators'. $item->Autoid.'" data-slide-to="'.$y.'" ></li>';
                          }
                         }
                         ?>
                            </ol>
                            <div class="carousel-inner">
                              <?php
                                for ($z = 0; $z  < $count2; $z++) { 
                                  if($z==0){
                                    echo '<div class="carousel-item active">';
            
                                    ?>
                                    <img  src="{{URL::to('public/upload/images_cls/'.$mangImages[$z]->{"File_Name"})}}"  style="height:auto" class="d-block w-100" alt="...">
                                    <?php
                                    echo '</div>';
                                  }else{
                                    echo '<div class="carousel-item">';
                                      ?>
                                        <img  src="{{URL::to('public/upload/images_cls/'.$mangImages[$z]->{"File_Name"})}}" style="height:auto"  class="d-block w-100" alt="...">
                                      <?php
                        
                                      echo '</div>';
                                  }
                                }
                              ?>
                            </div>
                            <a class="carousel-control-prev" href="#carouselExampleIndicators{{ $item->Autoid}}" role="button" data-slide="prev">
                              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                              <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#carouselExampleIndicators{{ $item->Autoid}}" role="button" data-slide="next">
                              <span class="carousel-control-next-icon" aria-hidden="true"></span>
                              <span class="sr-only">Next</span>
                            </a>
                          </div>

                         <?php  }
                        ?>    
                       
                        
                        <div>{{empty((json_decode($item->JsonKetqua)
                        ->{"KyThuat_ThuThuat"}[0]))?'':'Kỹ thuật: '.(json_decode($item->JsonKetqua)->{"KyThuat_ThuThuat"}[0])}}</div>
                        <div>{{empty((json_decode($item->JsonKetqua)
                        ->{"DeNghi_GhiChu"}[0]))?'':'Đề nghị: '.(json_decode($item->JsonKetqua)->{"DeNghi_GhiChu"}[0])}}</div>
                        <div>{{empty((json_decode($item->JsonKetqua)
                        ->{"KetLuan"}[0]))?'':'Kết luận: '.(json_decode($item->JsonKetqua)->{"KetLuan"}[0])}}</div>
                        {{-- <div>Ngày kết quả : {{ date('d/m/y', strtotime($item->NgayKetQua))}}</div> --}}
                    </div>


                    @endforeach
                   
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

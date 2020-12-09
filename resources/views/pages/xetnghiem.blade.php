@extends('layout')
@section('content')
<div class="page-inner">
  <div class="page-header">
      <h4 class="page-title"> KẾT QUẢ XÉT NGHIỆM</h4>
  </div>
  <div class="row">
    <div class="table-responsive table-wrapper ">
      <table  class="display table table-hover" >
        <thead>
          <tr>
              {{-- <th class="headXN" scope="col">BenhNhan_Id</th>
              <th class="headXN hide" scope="col">STT</th> --}}
              {{-- <th  class="headXN" scope="col">Ngày thực hiện</th> --}}
            <th  class="headXN" scope="col">Tên xét nghiệm</th>
            <th class="headXN" scope="col">Kết quả</th>
            <th class="headXN" scope="col">Đơn vị tính</th>
            <th class="headXN" scope="col">Trị số bình thường</th>
          </tr>
        </thead>
        <tbody>
          <?php   $id_dichvu_check=0;$id_nhomdichvu_check=0; $group2='';$ngaygiothuchien='';?>
                      @foreach ($kq_xnbn as $item=>$kq)
                      
                      <?php  
                      if(date('d-m-Y', strtotime($kq->NgayGioThucHien))!=$ngaygiothuchien){ ?>
                       <tr>
                           <td colspan="6"> <span class="ngaygiothuchien">{{date('d-m-Y', strtotime($kq->NgayGioThucHien))}}<span></td>
                         </tr>
                   <?php
                       }  ?>

                      <?php  
                             if($kq->NhomDichVu_Id!=$id_nhomdichvu_check){ ?>
                              <tr>
                                  <td colspan="6"> <span class="tennhomdichvu">&nbsp;&nbsp;{{$kq->NhomNoiDung}}<span></td>
                                </tr>
                          <?php
                              }  ?>
                      <?php  
                          if($kq->DichVu_Id!=$id_dichvu_check){ ?>
                              <tr>
                                  <td colspan="6"> <span class="tendichvu">&nbsp;&nbsp;&nbsp;&nbsp;{{$kq->TenDichVu}}<span></td>
                                </tr>
                          <?php
                              }  ?>
  
                      <?php  
                      if($kq->TenGroupCap2!=''&&$group2!=$kq->TenGroup){ ?>
                          <tr>
                              <td colspan="6"> <span class="tengroup">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{{$kq->TenGroup}}<span></td>
                          </tr>
                      <?php
                          }  ?>
                      <tr>
                          {{-- <td><span class="text-ellipsis">{{$kq->BenhNhan_Id}}</span></td>
                          <td class="hide"><span class="text-ellipsis">{{$kq->STT}}</span></td> --}}
                          {{-- <td><span class="text-ellipsis">{{date('d-m-Y', strtotime($kq->NgayGioThucHien))}}</span></td> --}}
                          <td><span class="text-ellipsis">{{$kq->NoiDung}}</span></td>
  
                          <td><span class="text-ellipsis">
                              <?php
                              if ($kq->BatThuong==1){
                              ?>
                                  <span class="batthuong">  {{$kq->KetQua}}</span>
                              <?php
                              }else {
                              ?>
                              <span class="">{{$kq->KetQua}}</span>
                              <?php }?>
                      
                          </span></td>
                          <td><span class="text-ellipsis">{{$kq->DonViTinh}}</span></td>
                          <td><span class="text-ellipsis">{{$kq->CSBT}}</span></td>
                          </tr>

                          <?php $id_dichvu_check =$kq->DichVu_Id; $id_nhomdichvu_check =$kq->NhomDichVu_Id;$group2=$kq->TenGroup;
                          $ngaygiothuchien=  date('d-m-Y', strtotime($kq->NgayGioThucHien));

                        
                          ?>
                      @endforeach
        </tbody>
      </table>
    </div>
  </div>
    {{-- <div class="col-sm-12 col-md-12">
   
        
        <div class="card-body caption-ketqua">
            KẾT QUẢ XÉT NGHIỆM
          </div> --}}
          {{-- <div class="row row-card-no-pd"> --}}
  

     
     
    
</div>
@endsection
@extends('layout')
@section('content')
<div class="page-inner">
    <div class="page-header">
        <h4 class="page-title"> Toa thuốc</h4>
    </div>
    <div class="row">
      <div class="table-responsive table-wrapper ">
        <table  class="display table table-hover" >
          <thead>
            <tr>
              <th  class="headXN" scope="col">Dược</th>
              <th class="headXN" scope="col">Sáng</th>
              <th class="headXN" scope="col">Trưa</th>
              <th class="headXN" scope="col">Chiều</th>
              <th class="headXN" scope="col">Tối</th>
              <th class="headXN" scope="col">Số ngày</th>
              <th class="headXN" scope="col">Số lượng</th>
              <th class="headXN" scope="col">Đường dùng</th>
            </tr>
          </thead>
          <tbody>
            <?php   $NgayKham='';?>
                        @foreach ($kq_xnbn as $item=>$kq)
                        
                        <?php  
                        if(date('d-m-Y', strtotime($kq->NgayKham))!=$NgayKham){ ?>
                         <tr>
                             <td colspan="6"> <span >Ngày khám: {{date('d-m-y', strtotime($kq->NgayKham))}}</span>
                                {{-- <span>- Số toa: {{($kq->SoToa)}}</span> --}}
                                <span>- Bác sĩ khám: {{($kq->TenBacSyKham)}}</span>
                                <span>- Chẩn đoán: {{($kq->ChanDoan)}}</span>
                             <span>- Lời dặn: {{($kq->LoiDan)}}</span>
                             </td>
                           </tr>
                     <?php
                         }  ?>
                        <tr>
                            <td><span class="text-ellipsis">{{$kq->TenDuocDayDu}}</span></td>
                            <td ><span class="text-ellipsis">{{$kq->Sang}}</span></td>
                            <td><span class="text-ellipsis">{{$kq->Trua}}</span></td>
                            <td><span class="text-ellipsis">{{$kq->Chieu}}</span></td>
                            <td><span class="text-ellipsis">{{$kq->Toi}}</span></td>
                            <td><span class="text-ellipsis">{{$kq->SoNgay}}</span></td>
                            <td><span class="text-ellipsis">{{($kq->Sang+$kq->Trua+$kq->Chieu+$kq->Toi)*$kq->SoNgay}}</span></td>
                            <td><span class="text-ellipsis">{{$kq->DuongDung}}</span></td>
                        </tr>
  
                            <?php  $NgayKham=  date('d-m-Y', strtotime($kq->NgayKham));
                            ?>
                        @endforeach
          </tbody>
        </table>
      </div>
    </div>

      
  </div>
@endsection
@extends('admin.layoutadmin')
@section('contentadmin')
<style>
    .select,
    #locale {
      width: 100%;
    }
    .like {
      margin-right: 10px;
    }
    #tableinfo{
      color: red !important;
    }
  </style>
<div class="page-inner">
    <div class="row">
        <div class="col-sm-12">
           <input class="form-control" id="lsHopdong" value="" />
            <textarea name="smscontent" class="form-control" id="smscontent" rows="2" placeholder="Nhập nội dung tin nhắn không dấu"></textarea>
        </div>

        <div class="col-sm-12">
            <div class="table-responsive">
                    <table id="table" 
                    data-toolbar="#toolbar"
                    data-search="true"
                    {{-- data-show-refresh="true" --}}
                    data-show-toggle="true"
                    data-show-fullscreen="true"
                    data-show-columns="true"
                    data-show-columns-toggle-all="true"
                    data-detail-view="false"
                    data-show-export="true"
                    data-click-to-select="true"
                    {{-- data-detail-formatter="detailFormatter" --}}
                   data-minimum-count-columns="1"
                    data-show-footer="false"
                    data-id-field="MaYte"
                    >
                </table>
                <div id="toolbar">
                    <button id="sendSms" class="btn btn-success" type="submit" >
                        <i class="fab fa-telegram-plane"></i> Gởi tin nhắn
                    </button>
                    <label  name="noti" id="noti">Mật khẩu về mặc định khi gởi SMS. <label>
                    <label  name="tableinfo" id="tableinfo">0<label>
            </div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
    var _hopdong_id=0;
        $(document).ready(function() {
        
            var dulieu='';
            
            $.ajax({
                type: 'GET',
                async : false,
                url:  'listhopdong',
                success: function(data, status, xhr) {
                    dulieu=data;
                }
            });

            $('#lsHopdong').inputpicker({
                data:dulieu,
                fields:[
                    {name:'value',text:'Id'},
                    {name:'text',text:'Tên công ty'},
                    {name:'So_HD',text:'Số HĐ'}
                ],
                headShow: false,
                fieldText : 'text',
                fieldValue: 'value',
                filterOpen: true
             });
            
             $('#lsHopdong').change(function(input){
              _hopdong_id=input.delegateTarget.value;
                $table.bootstrapTable('refresh', {
                     url: document.URL+ '/benhnhan_byhopdong/'+input.delegateTarget.value+'?hopdong_id'
                 });
               
                 var rowCount = ($('#table tr:last').index() + 1);
                 checkedRows = [];
            });
        });

    </script>

<script>

    var checkedRows = [];//tổng số tin nhắn sẽ gởi đi
    $('#sendSms').click(function(){
      
      var noidungSms=$('#smscontent').val();
      if(noidungSms!=''){
        if(checkedRows.length==0){
                    alert('Hãy tic chọn tin nhắn tất cả');
                }
                else{
                   
                   // alert(noidungSms);
                    $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                    });
                    $.ajax({
                    type: "POST",
                    datatype: 'JSON',
                    url: 'sendSmsContent',
                    data: { 'listPhone':checkedRows,'noidungSms':noidungSms,'hopdong_id':_hopdong_id},
                    success:  function(data, status, xhr) {
                          $table.bootstrapTable('refresh', {
                          url: document.URL+ '/benhnhan_byhopdong/'+_hopdong_id+'?hopdong_id'
                          });
                          checkedRows = [];
                          $('#tableinfo').text( "Chưa chọn tin nhắn sẽ gởi");
                       
                     },
                    error: function (response) {
                       // console.log(response);
                    }
                    });
                }
      }else{
        alert('hãy nhập nội dung tin nhắn');
      }
         
    });

    var $table = $('#table')
    var $remove = $('#remove')
    var selections = []
  
    function getIdSelections() {
      return $.map($table.bootstrapTable('getSelections'), function (row) {
        return row.id
      })
    }
  
    function responseHandler(res) {
      $.each(res.rows, function (i, row) {
        row.state = $.inArray(row.id, selections) !== -1
      })
      return res
    }
  
    function detailFormatter(index, row) {
      var html = []
      $.each(row, function (key, value) {
        html.push('<p><b>' + key + ':</b> ' + value + '</p>')
      })
      return html.join('')
    }
  
    function operateFormatter(value, row, index) {
      return [
        '<a class="like" href="javascript:void(0)" title="Like">',
        '<i class="fa fa-heart"></i>',
        '</a>  ',
        '<a class="remove" href="javascript:void(0)" title="Remove">',
        '<i class="fa fa-trash"></i>',
        '</a>'
      ].join('')
    }
  
    window.operateEvents = {
      'click .like': function (e, value, row, index) {
        alert('You click like action, row: ' + JSON.stringify(row))
      },
      'click .remove': function (e, value, row, index) {
        $table.bootstrapTable('remove', {
          field: 'id',
          values: [row.id]
        })
      }
    }
  
    function totalTextFormatter(data) {
      return 'Tổng số tin sẽ nhắn'
    }
  
    function totalNameFormatter(data) {
      alert(data.length);  
        return data.length
    }
  
    function totalPriceFormatter(data) {
    }
  
    function initTable() {
      $table.bootstrapTable('destroy').bootstrapTable({
        height: (window.innerHeight-223),
       // locale: $('#locale').val(),
        columns: [  
            {
            field: 'state',
            checkbox: true,
           // rowspan: 2,
            align: 'center',
            footerFormatter: '',
            width: 1,
          },
            {
            title: 'Mã Y Tế',
            field: 'MaYte',
          //  rowspan: 2,
            align: 'left',
          //  valign: 'middle',
            sortable: true,
            footerFormatter: totalTextFormatter
          },
          
          {
            field: 'TenBenhNhan',
            title: 'Họ tên BN',
            sortable: true,
            footerFormatter: totalNameFormatter,
            align: 'left',
            width: 25,
          }, {
            field: 'NamSinh',
            title: 'Năm sinh',
            sortable: true,
            align: 'left',
            footerFormatter: '',
            width: 5,
          },
          {
            field: 'SoDienThoai',
            title: 'Điện thoại',
            align: 'left',
            clickToSelect: false,
            footerFormatter: '',
            width: 5,
           // events: window.operateEvents,
          //  formatter: operateFormatter
          },
          {
            field: 'GoiThanhCong',
            title: 'Gởi thành công',
            align: 'left',
            clickToSelect: false,
            footerFormatter: '',
           // events: window.operateEvents,
          //  formatter: operateFormatter
          },
          // {
          //   field: 'ThaoTacGoi',
          //   title: 'Số lần gởi',
          //   align: 'left',
          //   clickToSelect: false,
          //   footerFormatter: '',
          // },
          {
            field: 'GoiLanCuoi',
            title: 'Gởi lần cuối',
            align: 'left',
            clickToSelect: false,
            footerFormatter: '',
          },
          {
            field: 'TrangThaiSms',
            title: 'Kết quả cuối',
            align: 'left',
            clickToSelect: false,
            footerFormatter: '',
          },
        
        ]
      });

      $table.on('check.bs.table uncheck.bs.table ' +'check-all.bs.table uncheck-all.bs.table',
      function () {
        $remove.prop('disabled', !$table.bootstrapTable('getSelections').length)
  
        // save your data, here just save the current page
        selections = getIdSelections()
        // push or splice the selections if you want to save all data selections
      });

      $table.on('all.bs.table', function (e, name, args) {
        //console.log(name, args);
      //  console.log(name, args)
        //alert(e);
      });

    $('#table').on('check-all.bs.table', function (e, rowsAfter) {
        checkedRows = [];
        $.each(rowsAfter, function(index, value) {
               checkedRows.push({MaYte : rowsAfter[index].MaYte,SoDienThoai: rowsAfter[index].SoDienThoai});
        });
        $('#tableinfo').text( checkedRows.length+" tin nhắn sẽ gởi");
    });

    $('#table').on('uncheck-all.bs.table', function (e, row) {
       checkedRows=[];
       $('#tableinfo').text( checkedRows.length+" tin nhắn sẽ gởi");
    });


    $('#table').on('check.bs.table', function (e, row) {
   
          checkedRows.push({MaYte : row.MaYte,SoDienThoai:row.SoDienThoai});
          $('#tableinfo').text( checkedRows.length+" tin nhắn sẽ gởi");
    });

    $('#table').on('uncheck.bs.table', function (e, row) {
        $.each(checkedRows, function(index, value) {
            if (value.MaYte == row.MaYte) {
            checkedRows.splice(index,1);

            }
            $('#tableinfo').text( checkedRows.length+" tin nhắn sẽ gởi");
         });
        // $('#tableinfo').text( checkedRows.length);
        // var indexof = checkedRows.indexOf({mayte : row.MaYte,sodienthoai:row.SoDienThoai});
        // checkedRows.splice(indexof,1);
    });

      $remove.click(function () {
        var ids = getIdSelections()
        $table.bootstrapTable('remove', {
          field: 'MaYte',
          values: ids
        })
        $remove.prop('disabled', true)
      })
    }
  
    $(function() {
      initTable();
            var $search = $('.fixed-table-toolbar .search input');
            $search.attr('placeholder', 'Tìm kiếm');
            $search.css('border', '1px solid blue');
            $('.btn-secondary').css('background-color', '##9b2');
    });
  </script>
 
  @endsection
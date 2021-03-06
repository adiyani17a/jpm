@extends('main')

@section('title', 'dashboard')

@section('content')

<style type="text/css">
   .datatable thead tr th{
    text-align: center;
   }
</style>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> Master Persentase
                     <!-- {{Session::get('comp_year')}} -->
                     </h5>

                </div>
    <div class="ibox-content">
        <div class="row">
            <div class="col-xs-12">
              <div class="box" id="seragam_box">
                <div class="box-header">

                </div><!-- /.box-header -->     
                <div class="box-body">
                <button type="button" class="btn btn-primary pull-right" onclick="tambah()"><i class="fa fa-plus"> Tambah Data</i></button>
                <table class="datatable table table-bordered">
                    <thead align="center">
                        <tr>
                            <th>Kode</th>
                            <th>Akun</th>
                            <th>Kode Cabang</th>
                            <th>Nama pihak</th>
                            <th>Jenis Biaya</th>
                            <th>Keterangan</th>
                            <th width="100">Persentase</th>
                            <th>Aksi</th>
                    
                        </tr>
                    </thead>
                    <tbody >
                        @foreach($data as $index=>$val)
                        <tr>
                            <td align="center">
                                <input type="hidden" name="kode" style="width: 100px;"  class="kode_master kode_{{$val->kode}} form-control"  value="{{$val->kode}}">
                                {{$val->kode}}
                            </td>
                            <td class="">
                                {{$val->kode_akun}}
                                <input type="hidden" value="{{$val->kode_akun}}" class="akun_tabel">
                            </td>
                            <td class="">
                                {{$val->cabang}}
                                <input type="hidden" value="{{$val->cabang}}" class="cabang_tabel">
                            </td>
                            <td class="">
                               {{$val->nama}}
                                <input type="hidden" value="{{$val->nama}}" class="nama_tabel">
                            </td>
                            <td>
                              {{$val->mjb_nama}}
                              <input type="hidden" value="{{$val->mjb_nama}}" class="jenis_biaya_detail">
                            </td>
                            <td class="">
                                {{$val->keterangan}}
                                <input type="hidden" value="{{$val->keterangan}}" class="keterangan_tabel">
                            </td>
                            <td align="right">
                                <input type="text" readonly="" class="persen_tabel form-control" style="width: 100px; display: inline-block;"  style="text-align: center;" onblur="" value="{{$val->persen}}"><span> %</span>  
                            </td>
                            <td align="center">
                                @if($val->cabang != 'GLOBAL')
                                <a onclick="edit_modal(this)"><i class="fa fa-pencil"> Edit</i></a>
                                <a href="{{route('hapusPersen',['id' =>$val->kode])}}"><i class="fa fa-trash"> Hapus</i></a>
                                @else
                                <a onclick="edit_modal(this)"><i class="fa fa-pencil"> Edit</i></a>
                                @endif
                            </td>
        
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>            
              </div>
            </div>
        </div>
    </div>

            </div><!-- /.col -->
        </div><!-- /.row -->
    </div>
</div>
 


<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Form Create</h4>
        </div>
        <div class="modal-body">
          <div>
            <form class="form table_member">
            <table class="table table-bordered table-striped">
              <tr>
                <td>Nama Pembiayaan</td>
                <td>
                  <input type="text" name="pembiayaan" class="form-control pembiayaan" placeholder="pembiayaan">
                  <input type="hidden" name="kode" class="form-control kode_id" placeholder="pembiayaan">
                </td>
              </tr>
              <tr>
                <td>Persentase</td>
                <td><input type="text" name="persentase" class="form-control persentase" placeholder="persen"></td>
              </tr>
              <tr>
                <td>Cabang</td>
                <td >
                    <select onchange="dropdown()" class="form-control cabang chosen-select-width" name="cabang">
                        <option selected="" value="0">- pilih-cabang -</option>
                        <option value="GLOBAL">GLOBAL</option>
                        @foreach($cabang as $val)
                        <option value="{{$val->kode}}">{{$val->kode}} - {{$val->nama}}</option>
                        @endforeach
                    </select>
                </td>
              </tr>
              <tr>
                <td>Kode Akun</td>
                <td class="akun_modal">
                    <select style="display: inline-block; " class="form-control nama_akun_dropdown chosen-select-width1" name="nama_akun">
                        <option selected="" disabled="" value="0">- pilih-akun -</option>
                        @foreach($akun as $val)
                        <option value="{{$val->id_akun}}">{{$val->id_akun}} - {{$val->nama_akun}}</option>
                        @endforeach
                    </select>
                </td>
              </tr>
              <tr>
                <td>Jenis Biaya</td>
                <td class="">
                    <select style="display: inline-block; " class="form-control jenis_biaya chosen-select-width1" name="jenis_biaya">
                        <option>- Jenis - Biaya -</option>     
                        @foreach($jenis_bayar as $val)
                        <option value="{{$val->mjb_id}}">{{$val->mjb_id}} - {{$val->mjb_nama}}</option>     
                        @endforeach    
                    </select>
                </td>
              </tr>
              <tr>
                <td>Keterangan</td>
                <td>
                    <textarea style="min-width: 100%; max-height: 300px;max-width: 365px;" name="keterangan" class="form-control keter"></textarea>
                </td>
              </tr>
            </table>
          </form>
          </div>
        </div>
        <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" onclick="save_member()">Save changes</button>
      </div>
    </div>
  </div>
</div>



@endsection



@section('extra_scripts')
<script type="text/javascript">
$(document).ready(function(){
  @if(isset($status))
  console.log({{$status}});
  
  toastr.success('Data Berhasil Dihapus');
  @endif
});
var datatable = $('.datatable').DataTable({'paging':false});

function update(ini){
    var parent = ini.parentNode.parentNode;
    var kode = $(parent).find('.kode').val();
    var nama = $(parent).find('.nama').val();
    var harga = $(parent).find('.harga').val();
    console.log(harga);
      $.ajax({
      url:baseUrl + '/presentase/update/'+kode+'/'+nama+'/'+harga,
      type:'get',
      success:function(data){
        toastr.success('Data Berhasil Di Update');
      },
      error:function(){
        toastr.error('Data Gagal Di Update');
      }
    })
}

function tambah(){
  $('.pembiayaan').val('');
  $('.persentase').val('');
  $('.kode_id').val('');
  $('.nama_akun_dropdown').val('0').trigger('chosen:updated');
  $('.cabang').val('0').trigger('chosen:updated');

  $('.keter').val('');
  $('#myModal').modal('show');
}

 var config1 = {
               '.chosen-select'           : {},
               '.chosen-select-deselect'  : {allow_single_deselect:true},
               '.chosen-select-no-single' : {disable_search_threshold:10},
               '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
               '.chosen-select-width1'     : {width:"100%"}
             }
             for (var selector in config1) {
               $(selector).chosen(config1[selector]);
             }
 var config = {
               '.chosen-select'           : {},
               '.chosen-select-deselect'  : {allow_single_deselect:true},
               '.chosen-select-no-single' : {disable_search_threshold:10},
               '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
               '.chosen-select-width'     : {width:"100%"}
             }
             for (var selector in config) {
               $(selector).chosen(config[selector]);
             }

    $(".nama_akun").chosen(config1);
    $(".cabang").chosen(config1);  

function save_member(){

    var biaya  = $('.pembiayaan').val();
    var persen = $('.persentase').val();
    var kode_id= $('.kode_id').val();
    var cabang = $('.cabang').val();
    var akun   = $('.nama_akun_dropdown').val();
    var ket    = $('.keter').val();
    var jenis_biaya  = $('.jenis_biaya').val();
    console.log(biaya);
    console.log(cabang);
    console.log(akun);
    console.log(jenis_biaya);
if (kode_id == '') {
    if(biaya != '' && persen != '' && cabang != 0 && akun != 0 && ket != '' && jenis_biaya != '0'){
       swal({
        title: "Apakah anda yakin?",
        text: "Simpan Data",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Simpan!",
        cancelButtonText: "Batal",
        closeOnConfirm: false
      },
      function(){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          $.ajax({
          url:baseUrl+'/presentase/tambah',
          type:'get',
          data:'biaya='+biaya+'&'+'persen='+persen+'&'+'cabang='+cabang+'&'+'akun='+akun+'&'+'ket='+ket+'&jb='+jenis_biaya,
          success:function(response){
            swal({
            title: "Berhasil!",
                    type: 'success',
                    text: "Data berhasil disimpan",
                    timer: 900,
                   showConfirmButton: true
                    },function(){
                       location.reload();
            });
          },
          error:function(data){
            swal({
            title: "Terjadi Kesalahan",
                    type: 'error',
                    timer: 900,
                   showConfirmButton: true

        });
       }
      });  
     });
   }else{
    toastr.warning('Data harus diisi semua');
   }
 }else{
  if(biaya != '' && persen != '' && cabang != 0 && akun != 0 && ket != '' && jenis_biaya != '0'){
  swal({
        title: "Apakah anda yakin?",
        text: "Simpan Data",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Ya, Simpan!",
        cancelButtonText: "Batal",
        closeOnConfirm: false
      },
      function(){
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
          });
          $.ajax({
          url:baseUrl+'/presentase/update',
          type:'get',
          data:'kode='+kode_id+'&'+'biaya='+biaya+'&'+'persen='+persen+'&'+'cabang='+cabang+'&'+'akun='+akun+'&'+'ket='+ket+'&jb='+jenis_biaya,
          success:function(response){
            swal({
            title: "Berhasil!",
                    type: 'success',
                    text: "Data berhasil disimpan",
                    timer: 900,
                   showConfirmButton: true
                    },function(){
                       location.reload();
            });
          },
          error:function(data){
            swal({
            title: "Terjadi Kesalahan",
                    type: 'error',
                    timer: 900,
                   showConfirmButton: true

        });
       }
      });  
     });
   }else{
    toastr.warning('Data harus diisi semua');
   }
 }
}


function dropdown(d){
  var id = $('.cabang').val();

// console.log(d);
  $.ajax({
    url:baseUrl + '/presentase/dropdown',
    data: 'id='+id,
    type:'get',
    success:function(response){
      $('.akun_modal').html(response);
      $('.nama_akun_dropdown').val(d).trigger('chosen:updated');

    }
  })

}

function edit_modal(p){
  var par = p.parentNode.parentNode;

  var pembiayaan  = $(par).find('.nama_tabel').val();
  var persen  = $(par).find('.persen_tabel').val();
  var cabang  = $(par).find('.cabang_tabel').val();
  var kode_akun  = $(par).find('.akun_tabel').val();
  var keterangan  = $(par).find('.keterangan_tabel').val();
  var kode_master  = $(par).find('.kode_master').val();
  var jenis_biaya  = $(par).find('.jenis_biaya_detail').val();
 // console.log(kode_akun);
  $('.pembiayaan').val(pembiayaan);
  $('.persentase').val(persen);
  $('.persentase').val(persen);
  $('.kode_id').val(persen);
  $('.cabang').val(cabang).trigger('chosen:updated');
  dropdown(kode_akun);
  $('.keter').val(keterangan);
  $('.kode_id').val(kode_master);
  $('.jenis_biaya').val(jenis_biaya).trigger('chosen:updated');;
  // console.log(kode_akun);
  $('#myModal').modal('show');
  
}
</script>
@endsection

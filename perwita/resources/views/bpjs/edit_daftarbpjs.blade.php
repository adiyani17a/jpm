@extends('main')

@section('title', 'dashboard')

@section('content')


<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Form Edit Pendaftaran BJPS
                     <!-- {{Session::get('comp_year')}} -->
                     </h5>
                    <div class="ibox-tools">
                    </div>
                </div>
                <div class="ibox-content">
                        <div class="row">
            <div class="col-xs-12">
              
              <div class="box" id="#">
                <div class="row">
                    <div class="col-sm-9"></div>
                    <!-- <div class="col-sm-2">Bulan Februari 2017</div> -->
                </div>
                <div class="box-body">
                  <form class="form-horizontal">
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nik">NIK</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nik" placeholder="value nik tenaga kerja">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="no peserta">Nomor Peserta</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="no peserta" placeholder="value no peserta tenaga kerja">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="nama">Nama Lengkap</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="nama" placeholder="value nama tenaga kerja">
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="tgl lahir">Tanggal Lahir</label>
                        <div class="col-sm-8">
                          <input type="date" class="form-control" id="tg; lahit" placeholder="value tempat lahir">
                        </div>
                    </div>
                    <div class="form-group">
                            <label class="control-label col-sm-2" for="jkel">Jenis kelamin</label>
                            <div class="radio-inline"></div>
                            <label class="radio-inline"><input type="radio" name="j_kel" id="j_kel" value="pria">Laki-Laki</label>
                            <label class="radio-inline"><input type="radio" name="j_kel" id="j_kel" value="wanita">Perempuan</label>
                       </div>
                    <div class="form-group">
                      <label class="control-label col-sm-2" for="upah">Upah Sebulan</label>
                        <div class="col-sm-8">
                          <input type="text" class="form-control" id="upah" placeholder="value upah tenaga kerja">
                        </div>
                    </div> 
                    <div class="form-group">
                      <label for="comment" class="control-label col-sm-2">Keterangan</label>
                      <div class="col-sm-8">
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                      </div>
                    </div>
                    <div class="form-group"> 
                      <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-default">Submit</button>
                        <a href="{{ url('bpjs/daftarbpjs ') }}"<button type="button" class="btn btn-md btn-danger" title="kembali">Kembali</button></a>
                      </div>
                    </div>
                  </form>
                </div><!-- /.box-body -->
                <div class="box-footer">
                  <div class="pull-right">
                    </div>
                  </div><!-- /.box-footer --> 
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row" style="padding-bottom: 50px;"></div>


@endsection



@section('extra_scripts')
<script type="text/javascript">
    $('.date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    function tambahdata() {
        window.location.href = baseUrl + '/data-master/master-akun/create'
    }
    function hapusData(id) {

        $.ajax({
            url: baseUrl + '/data-master/master-akun/delete/' + id,
            type: 'get',
            dataType: 'text',
            //headers: {'X-XSRF-TOKEN': $_token},
            success: function (response) {
                if (response == 'sukses') {
                    $('.alertBody').html('<div class="alert alert-success">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            'Data Berhasil Di Hapus' +
                            '</div>');
                    $('.alertBody').show();
                    $('.alertBody').delay(4000).slideUp(300);
                    $("#hapus" + id).remove();
                } else if (response == 'gagal') {
                    $('.alertBody').html('<div class="alert alert-danger">' +
                            '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' +
                            'Data Akun Sudah Digunakan' +
                            '</div>');
                    $('.alertBody').show();
                    $('.alertBody').delay(4000).slideUp(300);
                }

            }
        });
    }

</script>
@endsection

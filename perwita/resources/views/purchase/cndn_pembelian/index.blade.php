@extends('main')

@section('title', 'dashboard')

@section('content')

            <div class="row wrapper border-bottom white-bg page-heading">
                <div class="col-lg-10">
                    <h2> CN / DN Pembelian </h2>
                    <ol class="breadcrumb">
                        <li>
                            <a>Home</a>
                        </li>
                        <li>
                            <a>Purchase</a>
                        </li>
                        <li>
                          <a> Transaksi Purchase</a>
                        </li>
                        <li class="active">
                            <strong> CN / DN Pembelian </strong>
                        </li>

                    </ol>
                </div>
                <div class="col-lg-2">

                </div>
            </div>

<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12" >
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5> CN / DN Pembelian
                     <!-- {{Session::get('comp_year')}} -->
                     </h5>
                      <div class="text-right">
                       <a class="btn btn-success" aria-hidden="true" href="{{ url('cndnpembelian/createcndnpembelian')}}"> <i class="fa fa-plus"> Tambah Data  </i> </a> 
                    </div>
                </div>
                <div class="ibox-content">
                        <div class="row">
            <div class="col-xs-12">
              
              <div class="box" id="seragam_box">
              
                  <form class="form-horizontal" id="tanggal_seragam" action="post" method="POST">
                  <div class="box-body">
                       <!--  <div class="form-group">
                            
                            <div class="form-group">
                            <label for="bulan_id" class="col-sm-1 control-label">Bulan</label>
                            <div class="col-sm-2">
                             <select id="bulan_id" name="bulan_id" class="form-control">
                                                      <option value="">Pilih Bulan</option>
                                                      
                              </select>
                            </div>
                          </div>
                          </div>
                           <div class="form-group">
                            
                            <div class="form-group">
                            <label for="tahun" class="col-sm-1 control-label">Tahun</label>
                            <div class="col-sm-2">
                             <select id="tahun" name="tahun" class="form-control">
                                                      <option value="">Pilih Tahun</option>
                                                      
                              </select>
                            </div>
                          </div>
                          </div> -->
                </div>        
                    
                <div class="box-body">
                
                <table border="0">
                  <tr>
                    <td>
                      Pilihan :
                    </td>
                    <td> &nbsp; </td>
                    <td> <select class="form-control"> <option value=""> Debit Nota </option> <option value=""> Kredit Nota </option> </select> </td>
                    <td width="20px"> &nbsp; </td> <td> <a class="btn btn-success"> <i class="fa fa-search"> </i> </a> </td>
                  </tr>

                  <tr>
                    <td> &nbsp; </td>
                  </tr>
                   <tr>
                    <td> &nbsp; </td>
                  </tr>
                </table>  


                  <table id="addColumn" class="table table-bordered table-striped tbl-penerimabarang">
                    <thead>
                     <tr>
                        <th style="width:10px">NO</th>
                        <th> No CN / DN </th>
                        <th> Ex. Faktur </th>
                        <th> Supplier </th>
                        <th> Netto </th>
                        <th> Detail </th>
                     
                      
                    </tr>
                  

                    </thead>
                    <tbody>
                      
                      <tr>
                        <td> 1 </td>
                        <td>  No CN / DN  </td>
                        <td>  No Faktur </td>
                        <td> Supplier A </td>
                        <td> Rp 450.000 </td>
                        <td> <a class="btn btn-success" href={{url('cndnpembelian/detailcndnpembelian')}}><i class="fa fa-arrow-right" aria-hidden="true"></i> </a> </td>
                        
                      </tr>
                      <!-- <tr> <td rowspan="4"> 1 </td> <td rowspan="4"> </td> <td rowspan="4"> </td> <td> halo </td> <td> halo </td> <td> halo </td> <tr> <td> halo </td> <td> halo </td> <td> halo </td> </tr> <tr> <td> halo </td> <td> halo</td><td> halo</td>
                      </tr> -->
                    </tbody>
                   
                  </table>
                </div><!-- /.box-body -->
                <div class="box-footer">
                 
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

     tableDetail = $('.tbl-penerimabarang').DataTable({
            responsive: true,
            searching: true,
            //paging: false,
            "pageLength": 10,
            "language": dataTableLanguage,
    });

    $('.date').datepicker({
        autoclose: true,
        format: 'yyyy-mm-dd'
    });
    
   /* $('#tmbh_data_barang').click(function(){
      $("#addColumn").append('<tr> <td rowspan="3"> 1 </td> <td rowspan="3"> </td> <td rowspan="3"> </td>  <td rowspan="3"> </td> <td> halo </td> <td> 3000 </td>  <tr> <td> halo </td> <td>  5.000 </td> </tr> <tr><td> halo </td> <td> 3000 </td> </tr>');
    })*/
     $no = 0;
    $('#tmbh_data_barang').click(function(){
         $no++;
     $("#addColumn").append('<tr id=field-'+$no+'> <td> <b>' + $no +' </b> </td> <td> <select  class="form-control select2" style="width: 100%;" name="idbarang[]">  <option value=""> -- Pilih Data Barang -- </option> <option value="">  Barang 1 </option> <option value="">  Barang 2 </option> </td> <td> </td>  <td> </td> <td> </td> <td> <select  class="form-control select2" style="width: 100%;" name="idbarang[]"> <option value=""> -- Pilih Data Supplier -- </option> <option value="">  Supplier 1 </option> <option value="">  Supplier 2 </option> </td> <td> 3000 </td> <td> <button class="btn btn-danger remove-btn" data-id='+$no+' type="button"><i class="fa fa-trash"></i></button> </td> </tr>');



      $(document).on('click','.remove-btn',function(){
              var id = $(this).data('id');
              var parent = $('#field-'+id);

              parent.remove();
          })
    })

      $('#tmbh_supplier').click(function(){
            $no++;
        $("#addColumn").append('<tr id=supp-'+$no+'> <td> <b>  </b> </td> <td> </td> <td> </td>  <td> </td> <td> </td><td> <select  class="form-control select2" style="width: 100%;" name="idbarang[]"> <option value=""> -- Pilih Data Supplier -- </option> <option value="">  Supplier 1 </option> <option value="">  Supplier 2 </option>  </td> <td> 3000 </td> <td> <button class="btn btn-danger removes-btn" data-id='+$no+' type="button"><i class="fa fa-trash"></i></button>  </td> </tr>');


        $(document).on('click','.removes-btn',function(){
              var id = $(this).data('id');
       //       alert(id);
              var parent = $('#supp-'+id);

             parent.remove();
          })
     })
  
    

</script>
@endsection

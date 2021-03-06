<?php

namespace App\Http\Controllers\master_sales;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;


class vendor_Controller extends Controller
{
    public function table_data () {
        $sql = "    SELECT a.kode, a.nama, a.alamat, k.nama kota, a.telpon, a.status FROM vendor a
                    LEFT JOIN kota k ON k.id=a.id_kota  ";
        $list = DB::select(DB::raw($sql));
        $data = array();
        foreach ($list as $r) {
            $data[] = (array) $r;
        }
        $i=0;
        foreach ($data as $key) {
            
            if ($data[$i]['status']==TRUE) {
                    $Aktif = 'checked';
            } else {
                    $Aktif = '';
            }
            $data[$i]['status'] = '<input type="checkbox" '.$Aktif.' id="'.$data[$i]['kode'].'" class="btnaktif" >';
            // add new button
            $data[$i]['button'] = ' <div class="btn-group">
                                        <button type="button" id="'.$data[$i]['kode'].'" data-toggle="tooltip" title="Edit" class="btn btn-warning btn-xs btnedit" ><i class="glyphicon glyphicon-pencil"></i></button>
                                        <button type="button" id="'.$data[$i]['kode'].'" name="'.$data[$i]['nama'].'" data-toggle="tooltip" title="Delete" class="btn btn-danger btn-xs btndelete" ><i class="glyphicon glyphicon-remove"></i></button>
                                    </div> ';
            $i++;
        }
        $datax = array('data' => $data);
        echo json_encode($datax);
    }

    public function get_data (Request $request) {
        $id =$request->input('id');
        $data = DB::table('vendor')->where('kode', $id)->first();
        echo json_encode($data);
    }

    public function save_data (Request $request) {
        $simpan='';
        $crud = $request->crud;
        $data = array(
                'kode' => strtoupper($request->ed_kode),
                'nama' => strtoupper($request->ed_nama),
                'tipe' => strtoupper($request->cb_tipe),
                'id_kota' => strtoupper($request->cb_kota),
                'alamat' => strtoupper($request->ed_alamat),
                'telpon' => strtoupper($request->ed_telpon),
                'kode_pos' => strtoupper($request->ed_kode_pos),
                'status' => strtoupper($request->ck_status),
                'acc_penjualan' => strtoupper($request->cb_acc_penjualan),
                'csf_penjualan' => strtoupper($request->cb_csf_penjualan),
            );
        
        if ($crud == 'N') {
            $simpan = DB::table('vendor')->insert($data);
        }elseif ($crud == 'E') {
            $simpan = DB::table('vendor')->where('kode', $request->ed_kode_old)->update($data);
        }
        if($simpan == TRUE){
            $result['error']='';
            $result['result']=1;
        }else{
            $result['error']=$data;
            $result['result']=0;
        }
        $result['crud']=$crud;
        echo json_encode($result);
    }

    public function hapus_data (Request $request) {
        $hapus='';
        $id=$request->id;
        $hapus = DB::table('vendor')->where('kode' ,'=', $id)->delete();
        if($hapus == TRUE){
            $result['error']='';
            $result['result']=1;
        }else{
            $result['error']=$hapus;
            $result['result']=0;
        }
        echo json_encode($result);
    }

    public function index(){
        $kota = DB::select(DB::raw(" SELECT id,nama FROM kota ORDER BY nama ASC "));
        $akun= DB::select(DB::raw(" SELECT id_akun,nama_akun FROM d_akun ORDER BY id_akun ASC "));
        return view('master_sales.vendor.index',compact('kota','akun'));
    }

}

<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\masterItemPurchase;
use App\masterGroupItemPurchase;
use App\master_department;
use App\masterGudangPurchase;
use App\masterSupplierPurchase;
use Carbon\Carbon;
use PDF;
use DB;


class LaporanMasterController extends Controller
{
	public function tarif_cabang_dokumen(){

		$data = DB::select("SELECT tarif_cabang_dokumen.*,tarif_cabang_dokumen.kode as kodedokumen, res.asal,res1.tujuan 
							from tarif_cabang_dokumen 
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");

		$kota = DB::select("SELECT id, nama as tujuan from kota");
		$kota1 = DB::select("SELECT id, nama as asal from kota");

		return view('purchase/master/master_penjualan/laporan/tarifCabangDokumen',compact('data','kota','kota1'));
	}
	public function reportcabangdokumen(Request $request){

		// dd($request);	
		 $asal = $request->a;
		 $tujuan = $request->b;
		 if ($asal == 'semua' && $tujuan == 'semua' ) {
		 		$data2 = DB::select("SELECT tarif_cabang_dokumen.*,tarif_cabang_dokumen.kode as kodedokumen, res.asal,res1.tujuan 
							from tarif_cabang_dokumen 
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");
		 		return view("purchase/master/master_penjualan/pdf/pdf_tarifdokumen",compact('data2'));

		 }elseif ($asal == $asal && $tujuan == 'semua'){
		 	$data2 = DB::select("SELECT tarif_cabang_dokumen.*,tarif_cabang_dokumen.kode as kodedokumen, res.asal,res1.tujuan 
							from tarif_cabang_dokumen 
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal'");
		 }
		 elseif ($asal == 'semua' && $tujuan == $tujuan){
		 	$data2 = DB::select("SELECT tarif_cabang_dokumen.*,tarif_cabang_dokumen.kode as kodedokumen, res.asal,res1.tujuan 
							from tarif_cabang_dokumen 
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where tujuan like '$tujuan'");

		 }
		 elseif ($asal == $asal && $tujuan == $tujuan) {
		 	$data2 = DB::select("SELECT tarif_cabang_dokumen.*,tarif_cabang_dokumen.kode as kodedokumen, res.asal,res1.tujuan 
							from tarif_cabang_dokumen 
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal' and tujuan like '$tujuan' ");
		 }
		 else{
		 	return 'CONDINGANMU SALAH ... TOLE KAMU !';
		 }
			
		$d = date('y-h-d-is');

		$pdf = PDF::loadView('purchase/master/master_penjualan/pdf/pdf_tarifdokumen',compact('data2'))->setPaper('a4','potrait'); 
		return $pdf->stream('cabangdokumen'.$d.'.pdf');
	}
	

	public function tarif_cabang_koli(){

		$data = DB::select("SELECT tarif_cabang_koli.*, res.asal,res1.tujuan 
							from tarif_cabang_koli
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");

		$kota = DB::select("SELECT id, nama as tujuan from kota");
		$kota1 = DB::select("SELECT id, nama as asal from kota");


		return view('purchase/master/master_penjualan/laporan/tarifCabangKoli',compact('data','kota','kota1'));
	}
	public function reportcabangkoli(Request $request){
		// dd($request);
		 $asal = $request->a;
		 $tujuan = $request->b;
		 if ($asal == 'semua' && $tujuan == 'semua' ) {
		 		$data2 = DB::select("SELECT tarif_cabang_koli.*, res.asal,res1.tujuan 
							from tarif_cabang_koli
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");
		 		return view("purchase/master/master_penjualan/pdf/pdf_tarifkoli",compact('data2'));

		 }elseif ($asal == $asal && $tujuan == 'semua'){
		 	$data2 = DB::select("SELECT tarif_cabang_koli.*, res.asal,res1.tujuan 
							from tarif_cabang_koli
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal'");
		 }
		 elseif ($asal == 'semua' && $tujuan == $tujuan){
		 	$data2 = DB::select("SELECT tarif_cabang_koli.*, res.asal,res1.tujuan 
							from tarif_cabang_koli
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where tujuan like '$tujuan'");

		 }
		 elseif ($asal == $asal && $tujuan == $tujuan) {
		 	$data2 = DB::select("SELECT tarif_cabang_koli.*, res.asal,res1.tujuan 
							from tarif_cabang_koli
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal' and tujuan like '$tujuan' ");
		 }
		 else{
		 	return 'CONDINGANMU SALAH ... TOLE KAMU !';
		 }
			
		$d = date('y-h-d-is');

		$pdf = PDF::loadView('purchase/master/master_penjualan/pdf/pdf_tarifkoli',compact('data2'))->setPaper('a4','potrait'); 
		return $pdf->stream('cabangkoli'.$d.'.pdf');}

	public function tarif_cabang_kargo(){

		$data = DB::select("SELECT tarif_cabang_kargo.*, res.asal,res1.tujuan 
							from tarif_cabang_kargo
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");

		$kota1 = DB::select("SELECT id, nama as asal from kota");
		$kota = DB::select("SELECT id, nama as tujuan from kota");

		return view('purchase/master/master_penjualan/laporan/tarifCabangKargo',compact('data','kota','kota1'));
	}
	public function reportcabangkargo(Request $request){

		// dd($request);	
		 $asal = $request->a;
		 $tujuan = $request->b;
		 if ($asal == 'semua' && $tujuan == 'semua' ) {
		 		$data2 = DB::select("SELECT tarif_cabang_kargo.*, res.asal,res1.tujuan 
							from tarif_cabang_kargo
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id");
		 		return view("purchase/master/master_penjualan/pdf/pdf_tarifkargo",compact('data2'));

		 }elseif ($asal == $asal && $tujuan == 'semua'){
		 	$data2 = DB::select("SELECT tarif_cabang_kargo.*, res.asal,res1.tujuan 
							from tarif_cabang_kargo
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal'");
		 }
		 elseif ($asal == 'semua' && $tujuan == $tujuan){
		 	$data2 = DB::select("SELECT tarif_cabang_kargo.*, res.asal,res1.tujuan 
							from tarif_cabang_kargo
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where tujuan like '$tujuan'");

		 }
		 elseif ($asal == $asal && $tujuan == $tujuan) {
		 	$data2 = DB::select("SELECT tarif_cabang_kargo.*, res.asal,res1.tujuan 
							from tarif_cabang_kargo
							join (SELECT id, nama as asal from kota) as res
							on id_kota_asal = res.id
							join (SELECT id, nama as tujuan from kota) as res1
							on id_kota_tujuan = res1.id
							where asal like '$asal' and tujuan like '$tujuan' ");
		 }
		 else{
		 	return 'CONDINGANMU SALAH ... TOLE KAMU !';
		 }
			
		$d = date('y-h-d-is');

		$pdf = PDF::loadView('purchase/master/master_penjualan/pdf/pdf_tarifkargo',compact('data2'))->setPaper('a4','potrait'); 
		return $pdf->stream('mastersupplier'.$d.'.pdf');
	}
	 public function invoice(){

        $data =DB::table('invoice')->get();

        return view('laporan_sales.penjualan.index',compact('data'));
    }
    public function reportinvoice(Request $request){
    	// dd($request);
    	$awal = $request->a;
    	$akir = $request->b;
    	if ($awal == '' && $akir == '') {
    		$data =DB::select("SELECT * from invoice");
    	}
    	elseif ($awal == '' && $akir == $akir) {
	    	$data =DB::select("SELECT * from invoice where tanggal <= '$akir'");
    	}
    	elseif ($awal == $awal && $akir == '') {
	    	$data =DB::select("SELECT * from invoice where tanggal >= '$awal'");
    	}
	    elseif ($awal == $awal && $akir == $akir) {
	    	$data =DB::select("SELECT * from invoice where tanggal >= '$awal' AND tanggal <= '$akir'");
	    }


    	 return view('laporan_sales.penjualan.pdf_invoice',compact('data'));
    }
    public function deliveryorder(){

       $sql = "SELECT d.nomor, d.tanggal, d.nama_pengirim, d.nama_penerima, k.nama asal, kk.nama tujuan, d.status, d.total_net,d.total
                    FROM delivery_order d
                    LEFT JOIN kota k ON k.id=d.id_kota_asal
                    LEFT JOIN kota kk ON kk.id=d.id_kota_tujuan ORDER BY d.tanggal DESC LIMIT 1000";
        $data =  DB::select($sql);

        return view('laporan_sales.do.index',compact('data'));
    }
    public function reportdeliveryorder(Request $request){

    	$awal = $request->a;
    	$akir = $request->b;
    	if ($awal == '' && $akir == '') {
    		$sql = "SELECT d.nomor, d.tanggal, d.nama_pengirim, d.nama_penerima, k.nama asal, kk.nama tujuan, d.status, d.total_net,d.total
                    FROM delivery_order d
                    LEFT JOIN kota k ON k.id=d.id_kota_asal
                    LEFT JOIN kota kk ON kk.id=d.id_kota_tujuan 
                    ORDER BY d.tanggal DESC LIMIT 1000";
    	}
    	elseif ($awal == '' && $akir == $akir) {
	    	$sql = "SELECT d.nomor, d.tanggal, d.nama_pengirim, d.nama_penerima, k.nama asal, kk.nama tujuan, d.status, d.total_net,d.total
                    FROM delivery_order d
                    LEFT JOIN kota k ON k.id=d.id_kota_asal
                    LEFT JOIN kota kk ON kk.id=d.id_kota_tujuan 
                    where d.tanggal <= '$akir'
                    ORDER BY d.tanggal DESC LIMIT 1000";
    	}
    	elseif ($awal == $awal && $akir == '') {
	    	$sql = "SELECT d.nomor, d.tanggal, d.nama_pengirim, d.nama_penerima, k.nama asal, kk.nama tujuan, d.status, d.total_net,d.total
                    FROM delivery_order d
                    LEFT JOIN kota k ON k.id=d.id_kota_asal
                    LEFT JOIN kota kk ON kk.id=d.id_kota_tujuan 
                    where d.tanggal >= '$awal'
                    ORDER BY d.tanggal DESC LIMIT 1000";
    	}
	    elseif ($awal == $awal && $akir == $akir) {
	    	$sql = "SELECT d.nomor, d.tanggal, d.nama_pengirim, d.nama_penerima, k.nama asal, kk.nama tujuan, d.status, d.total_net,d.total
                    FROM delivery_order d
                    LEFT JOIN kota k ON k.id=d.id_kota_asal
                    LEFT JOIN kota kk ON kk.id=d.id_kota_tujuan 
                    where d.tanggal <= '$akir' AND d.tanggal >= '$awal'
                    ORDER BY d.tanggal DESC LIMIT 1000";
	    }
        $data =  DB::select($sql);
        
    	 return view('laporan_sales.do.pdf_deliveryorder',compact('data'));

    }	
	
}





















 ?>
<!DOCTYPE html>
<html>
<head>
  <title></title>
</head>
  <link href="{{ asset('assets/vendors/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <style type="text/css">
    .tandatangan{
    margin-top: 100px;
    margin-left: 40%;
    }
    body{
      font-family: arial;
      font-size: 12px;
    }
    .wrapper{
      border: 1px solid black;
      width: 1000px;
      margin:  10px 10px 10px 10px;
    }
    .bold{
      font-weight: bold;
    }
    .img{
      margin-left: 10px;
      margin-top: 10px;
    }
    .size{
      font-size: 14px;
    }
    .border {
      border:1px solid;
    }
    .header{
      font-size: 12px;
      margin-top: 20px;
    }
    .full-right{
      margin-bottom: 27px;
      padding-right:10px;
      padding-left:10px;
    }
    .bottomheader{
      border-bottom: 1px solid black;
    }
    .kepada{
     border-bottom: 1px solid;
     right:120%;
    }
    .tabel2{
      padding: 10px 10px;
      display: inline-block;
    }
    .jarak1{
      padding: -10px -10px -10px -10px;
    }
    .inlineTable {
      display: inline-block;
    }
    .tabel-utama{
      margin-left: 10px;
      width: 97%;
    }
    .textcenter{
      text-align: center;
    }
    .jarak{
      padding: 10px 10px 10px 10px;
    }
    .textright{
      text-align: right;
      padding-right: 5px;
    }
    .textleft{
      text-align: left;
      text-indent: 5px;
    }
    .hiddenborderleft{
      border-left:  0px ;
    }
    .hiddenborderright{
      border-right:  0px ;
    }
    .hiddenbordertop{
      border-top:  0px ;
    }
    .hiddenborderbottom{
      border-bottom:  0px ;
    }
    .borderright{
      border-right: 1px solid black;
      padding-right: 100px;
    }
    .borderrighttabel{
      border-right: 1px solid black;
    }
    .borderbottomtabel{
      border-bottom: 1px solid black;
    }
    .inputheader{
      width: 285px;
      border-bottom: 1px solid black;
    }
    .fontpenting{
      font-size: 11px;
      margin-top: 100px;
      font-family: georgia;
      padding: 3px 3px 3px 3px;
    }
    .ataspenting{
      margin:  20px 0px 2px 10px;
    }
    .tabelpenting{
      margin: 0px 0px 10px 10px;
      border:1px 1px 0px 1px solid black;
      width: 112%;
    }
    .headpenting{
      font-family: georgia;
      padding: 3px 3px 3px 3px;
    }
    .tab{
      margin-left: 10px;
      margin-top: 10px;
    }
    .boldtandatangan{
      font-weight: bold;
      font-size: 11px;
    }
    .tandatangandiv{
      margin-top: -225px;
      margin-left: 585px;
      margin-bottom: 10px;
    }
    .headtandatangan{
      text-align: center;
      width:  287px;
      padding-bottom: 70px;
    }
    .top{
      border-top: 1px solid black;
    }
    .bot{
      border-bottom: 1px solid black;
    }
    .bottabelutama{
      border-bottom: 1px solid grey;
    }
    .right{
      border-right: 1px solid black;
    }
    .left{
      border-left: 1px solid black;
    }
    .note{
      margin: 0px 10px 10px 10px;
      text-decoration: underline;
    }
    .underline{
      text-decoration: underline;
    }
    .nomorform{
      margin: -10px 0px 0px 700px;
    }
    .pull-right{
    margin-right: 14px;
    padding: 0px 10px 0px 0px;
    }
    .paddingimg{
      padding: 10px 10px 10px 10px;
    }
     .inputheader{
      width: 285px;
      border-bottom: 1px solid black;
    }
</style>
<body>
 <div class="wrapper">
   <table width="100%">
    <tr>
      <td class="right bot " width="20%"><img width="200" height="100" class="paddingimg" src="/jpm/perwita/img/logo_jpm.png"></td>
      <td class="right bot textcenter bold" style="font-size: 16px;" width="35.9%">LAPORAN STOCK OPNAME</td>
      <td class="right bot" valign="top" width="17.8%">
        <table>
           <tr>
            <td height="40" valign="top" class=" textleft">Bulan</td>
            <td valign="top">:</td>
            <td valign="top"></td>
          </tr>
        </table>
      </td>
      <td class="bot" valign="top">
        <table>
           <tr>
            <td height="40" valign="top" class=" textleft">Lokasi Gudang</td>
            <td valign="top">:</td>
            <td valign="top"></td>
          </tr>
        </table>
      </td>
    </tr>
   </table>
   <table width="100%">
     <tr>
       <th rowspan="2" class="right bot textcenter" width="7%">Nomor</th>
       <th rowspan="2" class="right bot textcenter" width="25%">Nama Barang</th>
       <th rowspan="2" class="right bot textcenter" width="15%">Satuan</th>
       <th colspan="2" class="right bot textcenter" width="17%">Stock Barang</th>
       <th colspan="2" class="right bot textcenter" width="17%">Jumlah Selisih</th>
       <th rowspan="2" class="bot textcenter" >Keterangan</th>
     </tr>
     <tr>
       <th class="right bot textcenter" width="9%">Fisik Barang</th>
       <th class="right bot textcenter" width="9%">Sesuai KS</th>
       <th class="right bot textcenter" width="9%">+</th>
       <th class="right bot textcenter" width="9%">-</th>
     </tr>
     <tr>
       <td class="right bot">&nbsp;</td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
     </tr>
     <tr>
       <td class="right bot">&nbsp;</td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
     </tr>
     <tr>
       <td class="right bot">&nbsp;</td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
     </tr>
     <tr>
       <td class="right bot">&nbsp;</td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
     </tr>
     <tr>
       <td class="right bot">&nbsp;</td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
       <td class="right bot"></td>
     </tr>

     <tr>
       <th class="right bot textcenter" colspan="3">Pelaksana Opname</th>
       <th class="right bot textcenter" colspan="5">Menyetujui</th>
     </tr>
   </table>
   <table width="100%">
     <tr>
       <td class="right textcenter" width="23.9%" height="90" valign="top">Staff Gudang</td>
       <td class="right textcenter" width="23%" valign="top">Staff Accounting</td>
       <td class="right textcenter" width="17.9%" valign="top">Manager umum dan HRD</td>
       <td class="right textcenter" width="17.9%" valign="top">Manager Keu dan Akubntansi</td>
       <td class="textcenter" valign="top">Directur Utama</td>
     </tr>
     <tr>
       <td class="right textleft" >Tanggal :</td>
       <td class="right textleft" >Tanggal :</td>
       <td class="right textleft" >Tanggal :</td>
       <td class="right textleft" >Tanggal :</td>
       <td class="textleft">Tanggal :</td>
     </tr>
   </table>
 </div>
 <p style="margin-left: 80%;margin-top: -8px;">JOAS-1212-1212-12</p>
</body>
</html>

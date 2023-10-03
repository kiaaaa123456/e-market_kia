<?php

use App\Models\Penjualan;
use Carbon\Carbon;

function no_invoice(){
    $cek_no_faktur_hari_ini = Penjualan::whereDate('created_at', Carbon::today())->count();//0

    if ($cek_no_faktur_hari_ini == 0) {
        $no_faktur = "ZIE". date('Y-m-d'). '0001';
        
        return $no_faktur;
    }else{
        $get_penjualan = Penjualan::orderBy('id', 'desc')->whereDate('created_at', Carbon::today())->first(); //ZIE2023-09-240001

        $sub = substr($get_penjualan->no_faktur, 8, 4) + 1; //0001 + 1 = 0002

        //0010

        $string = sprintf('%04s', $sub);
        $no_faktur = "ZIE" . date('Y-m-d') . $string;

        return $no_faktur;

    }
}
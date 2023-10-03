<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Http\Requests\StorePenjualanRequest;
use App\Http\Requests\UpdatePenjualanRequest;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\Pelanggan;

class PenjualanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function penjualan($no_faktur)
    {
        $data['penjualan'] = DB::table('penjualan')
        ->join('pelanggan', 'penjualan.pelanggan_id', '=', 'pelanggan.id')
        ->select('penjualan.*', 'pelanggan.id')
        ->get();
        $title = 'Penjualan';
         return view('penjualan.index', compact('title'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePenjualanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePenjualanRequest $request)
    {
        // dd($request->all());

        $barang = Barang::where('kode_barang', $request->kode_barang)->first();
        $pelanggan_id = $request->get('id');
        // $pelanggan = Pelanggan::where('id', $request->id)->get();

        // $pelanggan_id = $request->get('id');
            $pelanggan = Pelanggan::where('id', $pelanggan_id)->where('id', '=', 1)->get();


        $penjualan = new Penjualan;
        $penjualan->no_faktur = $request->no_faktur;
        $penjualan->tgl_faktur = date('Y-m-d');
        $penjualan->total_bayar = $barang->harga_jual * 1;
        $penjualan->pelanggan_id = $pelanggan->id;
        $penjualan->user_id = Auth::user()->id;

        $penjualan->save();
        return redirect('/penjualan/'. $request->no_faktur);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function show(Penjualan $penjualan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function edit(Penjualan $penjualan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePenjualanRequest  $request
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePenjualanRequest $request, Penjualan $penjualan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Penjualan  $penjualan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penjualan $penjualan)
    {
        //
    }
}

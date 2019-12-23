<?php

namespace App\Http\Controllers\ajax;

use App\Http\Controllers\Controller;
use App\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AjaxController extends Controller
{

    function caribarang(Request $request)
    {
        $KdBrg      = $request->get('KdBrg');


        $join   = DB::table('barang')
                ->join('kategori', 'barang.KdKategori','=','kategori.KdKategori')
                ->select('barang.KdBrg','barang.NmBrg','barang.Satuan','barang.HargaBrg','barang.Stok','kategori.KdKategori','kategori.NmKategori')
                ->where('barang.KdBrg','=',$KdBrg)
                ->first();

        return response()->json($join);
    }

    function caripelanggan(Request $request)
    {
        $KdPlg      = $request->get('KdPlg');

        $pelanggan  = Pelanggan::all()
                      ->where('KdPlg','=',$KdPlg)
                      ->first();

        // $join   = DB::table('barang')
        //         ->join('kategori', 'barang.KdKategori','=','kategori.KdKategori')
        //         ->select('barang.KdBrg','barang.NmBrg','barang.Satuan','barang.HargaBrg','barang.Stok','kategori.KdKategori','kategori.NmKategori')
        //         ->where('barang.KdBrg','=',$KdBrg)
        //         ->get();

        return response()->json($pelanggan);
    }

}

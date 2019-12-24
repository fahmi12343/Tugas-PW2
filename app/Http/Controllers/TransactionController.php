<?php

namespace App\Http\Controllers;

use App\Transaction;
use App\Barang;
use App\Detilpesan;
use App\Pelanggan;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransactionController extends Controller
{

    function index()
    {

        $transaction = Transaction::all();

        $barang = Barang::all();

        $pelanggan = Pelanggan::all();

       // $barang = Barang::paginate(2);
       $kd = $this->maxkode();

       // mengirim data kategori ke view index
       return view('users.transaction.index',['transaction' => $transaction])
       ->with('kd',$kd)
       ->with('barang',$barang)
       ->with('pelanggan',$pelanggan);

    }

    function prosestambah(Request $request)
    {
        // var_dump($request->get('NoPesan'));
        // var_dump($request->get('TglPesan'));
        // var_dump($request->get('KdPlg'));
        // die;


        $NoPesan    = $request  -> get('NoPesan');
        $TglPesan   = $request  -> get('TglPesan');
        $KdPlg      = $request  -> get('KdPlg');

        // tambah data
        $transaction = new Transaction();

            $transaction-> NoPesan      = $NoPesan;
            $transaction-> TglPesan     = $TglPesan;
            $transaction-> KdPlg        = $KdPlg;



        $KdBrg      = $request  -> get('KdBrg');
        $JmlPesan   = $request  -> get('JmlPesan');
        $HargaBrg   = $request  -> get('HargaBrg');
        $stok      = $request  -> get('stok');

        // tambah data
        $transactions = new  Detilpesan();

            $transactions-> NoPesan  = $NoPesan;
            $transactions-> KdBrg    = $KdBrg;
            $transactions-> JmlPesan = $JmlPesan;
            $transactions-> HargaBrg = $HargaBrg;


        $transaction->save();
        $transactions->save();

        return redirect()->route('transaction')
                         ->with('success', 'Show is successfully saved');



    }

    public function cetak_pdf()
    {
    	$transaction = Transaction::all();

    	$pdf = PDF::loadview('users.pdf.transaction_pdf',['transaction'=>$transaction]);
    	return $pdf->download('laporan-transaksi-pdf');
    }

    public function maxkode()
    {

        //MaxKode
        $max = Transaction::max('NoPesan');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "PSN";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

    }

}

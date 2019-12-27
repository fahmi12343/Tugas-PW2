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

    function index(Request $request)
    {


        $transaction = Transaction::all();

        $barang = Barang::all();

        $pelanggan = Pelanggan::all();

       // $barang = Barang::paginate(2);
       $kd = $this->maxkode();


       if(!empty($request->session()->get('keranjang'))) {
            $keranjang = $request->session()->get('keranjang');
       }
       else {
            $keranjang = "";
       }

       // mengirim data kategori ke view index
       return view('users.transaction.index',['transaction' => $transaction])
       ->with('keranjang',$keranjang)
       ->with('kd',$kd)
       ->with('barang',$barang)
       ->with('pelanggan',$pelanggan);


    }

    public function tambahkeranjang(Request $request)
    {
        if(!empty($request->session()->get('keranjang')))
        {
            $array = $request->session()->get('keranjang');
            array_push($array,
                            array(
                                $request  -> get('NoPesan'),
                                $request  -> get('KdBrg'),
                                $request  -> get('HargaBrg'),
                                $request  -> get('JmlPesan'),
                                $request  -> get('TglPesan'),
                                $request  -> get('KdPlg')
                            )
                );
        }
        else {
            $array =    array(
                                array(
                                    $request  -> get('NoPesan'),
                                    $request  -> get('KdBrg'),
                                    $request  -> get('HargaBrg'),
                                    $request  -> get('JmlPesan'),
                                    $request  -> get('TglPesan'),
                                    $request  -> get('KdPlg')
                                )
            );
        }

        $request->session() -> put('keranjang', $array);

        return redirect ('/transaction');

    }

    function prosestambah(Request $request)
    {
        // var_dump($request->get('NoPesan'));
        // var_dump($request->get('TglPesan'));
        // var_dump($request->get('KdPlg'));
        // die;

        $NoPesan    = $request  -> get('0');
        $TglPesan   = $request  -> get('4');
        $KdPlg      = $request  -> get('5');

        // tambah data
        $transaction = new Transaction();

        $transaction-> NoPesan      = $NoPesan[0];
        $transaction-> TglPesan     = $TglPesan[0];
        $transaction-> KdPlg        = $KdPlg[0];


        $KdBrg      = $request  -> get('1');
        $JmlPesan   = $request  -> get('3');
        $HargaBrg   = $request  -> get('2');
        // $stok      = $request  -> get('stok');


        for($i=0 ; $i < count($KdBrg) ; $i++)
        {
            // tambah data
            $transactions = new  Detilpesan();

            $transactions-> NoPesan  = $NoPesan[$i];
            $transactions-> KdBrg    = $KdBrg[$i];
            $transactions-> JmlPesan = $JmlPesan[$i];
            $transactions-> HargaBrg = $HargaBrg[$i];

            $transactions->save();
        }

        $transaction->save();

        $request->session()->forget('keranjang');

        return redirect()->route('transaction')
                         ->with('success', 'Show is successfully saved');



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

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Barang;
use App\Kategori;
use RealRashid\SweetAlert\Facades\Alert;

class BarangController extends Controller
{

    function index(Request $request)
    {

        // $barang  = Barang::all();

        // join table
        $join   = DB::table('barang')
        ->join('kategori', 'barang.KdKategori','=','kategori.KdKategori')
        ->select('barang.KdBrg','barang.NmBrg','barang.Satuan','barang.HargaBrg','barang.Stok','kategori.KdKategori','kategori.NmKategori')
        ->paginate(10);

        //ambil dari table kategori
        $kategori  = Kategori::select('*')->orderBy('NmKategori')->get();

        // $barang = Barang::paginate(2);
        $kd = $this->maxkode();

        // mengirim data kategori ke view index
        return view('users.barang.index',['join' => $join])
        ->with('kd',$kd)
        ->with('kategori',$kategori);

    }

    function tambah(Request $request)
    {

        $kategori  = Kategori::select('*')->orderBy('NmKategori')->get();

        return view('users.barang.index')
        ->with('kategori',$kategori);

    }

    function prosestambah(Request $request)
    {

        $KdBrg      = $request -> get('KdBrg');
        $NmBrg      = $request -> get('NmBrg');
        $Satuan     = $request -> get('Satuan');
        $HargaBrg   = $request -> get('HargaBrg');
        $Stok       = $request -> get('Stok');
        $KdKategori = $request -> get('KdKategori');

        $barang = new barang();

        if(!empty($KdBrg))
        {
            $barang    -> KdBrg  = $KdBrg;
        }
            $barang    -> NmBrg         = $NmBrg;
            $barang    -> Satuan        = $Satuan;
            $barang    -> HargaBrg      = $HargaBrg;
            $barang    -> Stok          = $Stok;
            $barang    -> KdKategori    = $KdKategori;

        if($barang->save())
        {
            Alert::success('Data Success Added!', Session('Success Message'));
            return redirect()->route('barang')
                             ->with('success', 'Show is successfully saved');
        }

    }

    function prosesubah(Request $request)
    {

        $id         = $request  ->get('id');
        $KdBrg      = $request  -> get('KdBrg');
        $NmBrg      = $request  -> get('NmBrg');
        $Satuan     = $request  -> get('Satuan');
        $HargaBrg   = $request  -> get('HargaBrg');
        $Stok       = $request  -> get('Stok');
        $KdKategori = $request  -> get('KdKategori');

        $barang    = Barang::findOrFail($id);

            $barang    -> KdBrg         = $KdBrg;
            $barang    -> NmBrg         = $NmBrg;
            $barang    -> Satuan        = $Satuan;
            $barang    -> HargaBrg      = $HargaBrg;
            $barang    -> Stok          = $Stok;
            $barang    -> KdKategori    = $KdKategori;

        if($barang->save())
        {
            // panggil function index
            Alert::success('Data Success Updated!', Session('Success Message'));
            return redirect()->route('barang')
                             ->with('success', 'Show is successfully saved');
        }

    }

    function hapus(Request $request, $id)
    {
        $barang    = Barang::find($id);


        try {

            if($barang -> delete())
                {
                    //panggil route
                        // return redirect()->route('kategori');

                    // panggil function index
                    Alert::success('Data Success Deleted!', Session('Success Message'));
                    return redirect()->route('barang')
                                    ->with('success', 'Show is successfully saved');
                }
        } catch (\Throwable $th) {
                echo "  <script>
                            alert('DATA SEDANG DIGUNAKAN Di RELASI DETAIL.');
                            window.history.back();
                        </script>";
        }


    }

    public function maxkode()
    {

        //MaxKode
        $max = Barang::max('KdBrg');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "BRG";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

    }

}

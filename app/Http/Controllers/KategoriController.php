<?php

namespace App\Http\Controllers;

use App\Exports\KategoriExport;
use Illuminate\Http\Request;
use App\Kategori;
use Barryvdh\DomPDF\Facade as PDF;
use Exception;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class KategoriController extends Controller
{
    function index()
    {

        // $kategori   = DB::table('kategori')->simplePaginate(10);
        // $kategori   = Kategori::all();
        $kategori   = Kategori::paginate(10);
        $kd = $this->maxkode();
        // mengirim data kategori ke view index
        return view('users.kategori.index',['kategori' => $kategori])
        ->with('kd',$kd);



    }

    function tambah(Request $request)
    {
        // validasi
        $validatedData = $request->validate([
            'KdKategori' => 'required|max:6',
            'NmKategori' => 'required|max:50',
        ]);

        // ambil data
        $KdKategori = $request -> get('KdKategori');
        $NmKategori = $request -> get('NmKategori');

        // tambah data
        $kategori = new kategori();

        $kategori -> KdKategori = $KdKategori;
        $kategori -> NmKategori = $NmKategori;

        // save
        $kategori->save();

        return redirect()->route('kategori.index')
                         ->with('success', 'Show is successfully saved');

    }

    function prosestambah(Request $request)
    {
        $KdKategori = $request -> get('KdKategori');
        $NmKategori = $request -> get('NmKategori');

        $kategori = new kategori();

        if(!empty($KdKategori))
        {
            $kategori    -> KdKategori  = $KdKategori;
        }
            $kategori    -> NmKategori      = $NmKategori;

        if($kategori->save())
        {
            return redirect()->route('kategori')
                             ->with('success', 'Show is successfully saved');
        }
    }

    function ubah(Request $request, $id)
    {


        $kategori  = Kategori::find($id);

        return view('ubahdosen')
        ->with('NmKategori', $kategori);
    }

    function prosesubah(Request $request)
    {
        $id         = $request->get('id');
        $KdKategori = $request->get('KdKategori');
        $NmKategori = $request -> get('NmKategori');

        $kategori    = Kategori::findOrFail($id);

            $kategori    -> KdKategori  = $KdKategori;
            $kategori    -> NmKategori  = $NmKategori;

        if($kategori->save())
        {
            // panggil function index
            return redirect()->route('kategori')
                             ->with('success', 'Show is successfully saved');
        }
    }

    function hapus(Request $request, $id)
    {
        $kategori    = Kategori::find($id);

        try {
            if($kategori -> delete())
            {
                //panggil route
                    // return redirect()->route('kategori');

                // panggil function index
                return redirect()->route('kategori')
                                 ->with('success', 'Show is successfully saved');
            }
        }
        catch(Exception $x) {
            echo "  <script>
                        alert('DATA SEDANG DIGUNAKAN DALAM BARANG.');
                        window.history.back();
                    </script>";
        }

    }

    public function cetak_pdf()
    {
    	$kategori = Kategori::all();

    	$pdf = PDF::loadview('users/kategori/pdf',['kategori'=>$kategori]);
    	return $pdf->stream();
    }

    public function export_excel()
	{
		return Excel::download(new KategoriExport, 'kategori.xlsx');
	}

    public function maxkode()
    {

        //MaxKode
        $max = Kategori::max('KdKategori');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "KTG";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

    }


}

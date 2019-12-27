<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggan;

class PelangganController extends Controller
{

    function index()
    {

        // $pelanggan  = Pelanggan::all();
        $pelanggan   = Pelanggan::paginate(10);
        $kd = $this->maxkode();
        // mengirim data kategori ke view index
        return view('users.Pelanggan.index',['pelanggan' => $pelanggan])
        ->with('kd',$kd);

    }

    function tambah(Request $request)
    {

        // validasi
        $validatedData = $request->validate([
            'KdPlg' => 'required|max:6',
            'NmPlg' => 'required|max:50',
            'AlamatPlg' => 'required|max:50',
            'TelpPlg' => 'required|max:15',
        ]);

        // ambil data
        $KdPlg      = $request  -> get('KdPlg');
        $NmPlg      = $request  -> get('NmPlg');
        $AlamatPlg  = $request  -> get('AlamatPlg');
        $TelpPlg    = $request  -> get('TelpPlg');

        // tambah data
        $pelanggan = new Pelanggan();

        $pelanggan -> KdPlg     = $KdPlg;
        $pelanggan -> NmPlg     = $NmPlg;
        $pelanggan -> AlamatPlg = $AlamatPlg;
        $pelanggan -> TelpPlg   = $TelpPlg;

        // save
        // flag=0
        // if(pelanggan->save()) {
        //     flag=flag+1
        // }
        $pelanggan->save();

        // if(detil_>save) [
        //     flag=fflag+1
        // ]

        // if(flag==2)



        return redirect()->route('pelanggan.index')
                         ->with('success', 'Show is successfully saved');

    }

    function prosestambah(Request $request)
    {

        // ambil data
        $KdPlg      = $request  -> get('KdPlg');
        $NmPlg      = $request  -> get('NmPlg');
        $AlamatPlg  = $request  -> get('AlamatPlg');
        $TelpPlg    = $request  -> get('TelpPlg');

        // tambah data
        $pelanggan = new Pelanggan();

        if(!empty($KdPlg))
        {
            $pelanggan -> KdPlg     = $KdPlg;
        }
            $pelanggan -> NmPlg     = $NmPlg;
            $pelanggan -> AlamatPlg = $AlamatPlg;
            $pelanggan -> TelpPlg   = $TelpPlg;

        if($pelanggan->save())
        {
            return redirect()->route('pelanggan')
                             ->with('success', 'Show is successfully saved');
        }

    }

    function prosesubah(Request $request)
    {
        $id         = $request  ->get('id');
        $KdPlg      = $request  -> get('KdPlg');
        $NmPlg      = $request  -> get('NmPlg');
        $AlamatPlg  = $request  -> get('AlamatPlg');
        $TelpPlg    = $request  -> get('TelpPlg');

        // Cari data
        $pelanggan    = Pelanggan::findOrFail($id);

            $pelanggan -> KdPlg     = $KdPlg;
            $pelanggan -> NmPlg     = $NmPlg;
            $pelanggan -> AlamatPlg = $AlamatPlg;
            $pelanggan -> TelpPlg   = $TelpPlg;

        if($pelanggan->save())
        {
            // panggil function index
            return redirect()->route('pelanggan')
                             ->with('success', 'Show is successfully saved');
        }
    }

    function hapus(Request $request, $id)
    {
        $pelanggan    = Pelanggan::find($id);

        if($pelanggan -> delete())
        {
            //panggil route
                // return redirect()->route('kategori');

            // panggil function index
            return redirect()->route('pelanggan')
                             ->with('success', 'Show is successfully saved');
        }
    }

    public function maxkode()
    {

        //MaxKode
        $max = Pelanggan::max('KdPlg');
        $ide = $max;
        $noUrut = (int) substr($ide, 3, 3);
        $noUrut++;

        $char = "PLG";
        $idevn = $char . sprintf("%03s", $noUrut);

        return $idevn;

    }

}

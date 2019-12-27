<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\view\view;
use Illuminate\Support\Facades\DB;

class UserChartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function index(request $request)
    {

        // $view = view::all();

        $view = view::all();

        // mengambil data view
        $Catagories = [];
        $Data       = [];

        foreach ($view as $views) {

            $Catagories[]   = $views->TglPesan;
            $Data[]         = $views->JmlPesan;

        }
            // var_dump(json_encode($Catagories));
            // die;

        // mengirim data kategori ke view index

        return view('dashboard',['view' => $view, 'Categories' => $Catagories, 'Data' => $Data ]);


    }

}



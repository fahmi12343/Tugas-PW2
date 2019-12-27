<?php

namespace App\Http\Controllers;

use App\Exports\PembelianExport;
use App\view\view;
use Barryvdh\DomPDF\Facade as PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Controllers\Controller;

class ReportController extends Controller
{
    public function cetak_pdf()
    {
    	$view = View::all();

        $pdf = PDF::loadview('users/pdf/pdf',['view'=>$view]);
        // bisa liat
        return $pdf->stream();

        // langsung download
    	// return $pdf->download('laporan-pembelian.pdf');
    }

    public function export_excel()
	{
        $view   = view::all();

		return Excel::download(new PembelianExport, 'Report_Pembelian.xlsx');
	}
}

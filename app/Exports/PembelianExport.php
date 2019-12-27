<?php

namespace App\Exports;

use App\view\view;
use Maatwebsite\Excel\Concerns\FromCollection;

class PembelianExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return view::all();
    }
}

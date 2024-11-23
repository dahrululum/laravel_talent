<?php

namespace App\Exports;

use App\Models\NilaiPotensi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class NilaiPotensiExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        $ms = NilaiPotensi::all();
        return view('excel.nilaipotensi', [
            'ms'            => $ms,
            
        ]);
        
    }
}

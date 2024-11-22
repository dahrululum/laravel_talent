<?php

namespace App\Exports;

use App\Models\IndikatorBox;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class RekapKompTalentaExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function __construct($view, $data="" )
    {
        $this->view = $view;
        $this->data = $data;
        
    }

    public function view(): View
    {
        $params    =    $this->data;
        $queryIB = IndikatorBox::query($params);
        $queryIB->latest();
        $allIB = $queryIB->get();

        //$ms = IndikatorBox::all();
        return view('excel.rekapkomptalenta', [
            'model'         => $allIB,
        ]);
        
    }
}

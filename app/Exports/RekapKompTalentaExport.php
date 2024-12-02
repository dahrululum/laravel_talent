<?php

namespace App\Exports;

use App\Models\IndikatorBox;
use App\Models\Refstandkom;
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

        $deskso1 = Refstandkom::where('no_komp',1)->first();
        $deskso2 = Refstandkom::where('no_komp',2)->first();
        $deskso3 = Refstandkom::where('no_komp',3)->first();
        $deskso4 = Refstandkom::where('no_komp',4)->first();
        $deskso5 = Refstandkom::where('no_komp',5)->first();
        $deskso6 = Refstandkom::where('no_komp',6)->first();
        $deskso7 = Refstandkom::where('no_komp',7)->first();
        $deskso8 = Refstandkom::where('no_komp',8)->first();
        $deskso9 = Refstandkom::where('no_komp',9)->first();
        

        //$ms = IndikatorBox::all();
        return view('excel.rekapkomptalenta', [
            'model'         => $allIB,
            'deskso1'       => $deskso1,
            'deskso2'       => $deskso2,
            'deskso3'       => $deskso3,
            'deskso4'       => $deskso4,
            'deskso5'       => $deskso5,
            'deskso6'       => $deskso6,
            'deskso7'       => $deskso7,
            'deskso8'       => $deskso8,
            'deskso9'       => $deskso9,
            

        ]);
        
    }
}

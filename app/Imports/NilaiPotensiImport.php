<?php

namespace App\Imports;

use App\Models\NilaiPotensi;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class NilaiPotensiImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nip = str_replace('`','',$row['nip']);
        return new NilaiPotensi([
            "nip"               => $nip,
            "nama"              => $row['nama'],
            "nilai_inovasi"     => $row['nilai_inovasi'],
            "nilai_prestasi"    => $row['nilai_prestasi'],
            
        ]);
    }
}

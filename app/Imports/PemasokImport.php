<?php

namespace App\Imports;

use App\Models\Pemasok;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PemasokImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pemasok([
            'nama_pemasok' => $row['nama_pemasok']
        ]);
    }

    public function headingRow(){
        return 1;
    }
}

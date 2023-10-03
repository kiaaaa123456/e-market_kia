<?php

namespace App\Imports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PembelianImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Pembelian([
            'pembelian_id' => auth()->user()->pembelian_id,
            'kode_masuk' => $row['kode_masuk'],
            'tanggal_masuk' => $row['tanggal_masuk'],
            'total' => $row['total'],
            'nama_pemasok' => $row['nama_pemasok'],
            'nama_user' => $row['nama_user'],
        ]);
    }

    public function headingRow(): int{
        return 4;
    }
}

<?php

namespace App\Exports;

use App\Models\Pembelian;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

class PembelianExport implements FromCollection, WithHeadings, WithEvents
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // $data['pembelian'] = DB::table('pembelian')
        // ->join('pemasok', 'pembelian.pemasok_id', '=', 'pemasok.id')
        // ->join('users', 'pembelian.user_id', '=', 'users.id')
        // ->select('pembelian.*', 'pemasok.nama_pemasok', 'users.name')
        // ->get();
        return DB::table('pembelian')
        ->join('pemasok', 'pembelian.pemasok_id', '=', 'pemasok.id')
        ->join('users', 'pembelian.user_id', '=', 'users.id')
        ->select('pembelian.kode_masuk','pembelian.tanggal_masuk','pembelian.total', 'pemasok.nama_pemasok', 'users.name')
        ->get();
    }
    
    public function headings(): array{
        return [
            'No.',
            'Kode Masuk',
            'Tanggal Masuk',
            'Total',
            'Nama Pemasok',
            'User',
        ];
    }

    public function registerEvents(): array
    {
        return[
            AfterSheet::class => function(AfterSheet $event){
                $event->sheet->getColumnDimension('A')->setAutoSize(true);
                $event->sheet->getColumnDimension('B')->setAutoSize(true);
                $event->sheet->getColumnDimension('C')->setAutoSize(true);
                $event->sheet->getColumnDimension('D')->setAutoSize(true);
                $event->sheet->getColumnDimension('E')->setAutoSize(true);
                $event->sheet->getColumnDimension('F')->setAutoSize(true);

                $event->sheet->insertNewRowBefore(1,2);
                $event->sheet->mergeCells('A1:F1');
                $event->sheet->setCellValue('A1','DATA PEMBELIAN');
                $event->sheet->getStyle('A1')->getFont()->setBold(true);
                $event->sheet->getStyle('A1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);

                $event->sheet->getStyle('A3:F'.$event->sheet->getHighestRow())->applyFromArray([
                    'borders' =>[
                        'allBorders' =>[
                            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                            'color' => ['argb' => '000000']
                        ]
                    ]
                        ]);
            }
        ];
    }
}

<?php

namespace App\Exports;

use Illuminate\Support\Carbon;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\History;
use App\Models\LaporanPeriodik;
use Maatwebsite\Excel\Concerns\WithMapping;

class LaporanExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        $histories = LaporanPeriodik::select('id', 'time', 'total_activity')->get();
        return $histories;
    }
    public function headings(): array
    {
        return ["Id", "time", "total_activity_approval"];
    }
}

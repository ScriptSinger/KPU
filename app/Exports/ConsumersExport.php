<?php

namespace App\Exports;

use App\Models\Consumer;
use Illuminate\Support\Arr;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithMapping;

class ConsumersExport implements FromCollection, ShouldAutoSize, WithMapping
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function map($consumer): array
    {
        return [
            $consumer->personal_account,
            $consumer->full_name,
            $consumer->district,
            $consumer->street,
            $consumer->house,
            $consumer->building,
            $consumer->apartment,
            $consumer->model,
            $consumer->number,
            $consumer->verif_date,
            $consumer->seal,
            $consumer->year_release,
            $consumer->day_zone,
            $consumer->crawl_date,
            $consumer->reading,
            $consumer->note,
        ];
    }

    public function collection()
    {
        return Consumer::all();
    }
}

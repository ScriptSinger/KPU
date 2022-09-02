<?php

namespace App\Imports;

use App\Models\Consumer;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class ConsumersImport implements ToCollection
{
    private $area_id;
    public function __construct($id)
    {
        $this->area_id = $id;
    }

    public function collection(Collection $rows)
    {
        foreach ($rows as $row) {
            Consumer::create([
                'personal_account' =>  $row[0],
                'full_name' => $row[1],
                'district' => $row[2],
                'street' => $row[3],
                'house' => $row[4],
                'building' => $row[5],
                'apartment' => $row[6],
                'model' => $row[7],
                'number' => $row[8],
                'verif_date' => $row[9],
                'seal' => $row[10],
                'year_release' => $row[11],
                'day_zone' => $row[12],
                'crawl_date' => $row[13],
                'reading' => $row[14],
                'note' => $row[15],
                'area_id' => $this->area_id
            ]);
        }
    }
}

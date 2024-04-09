<?php

// app/Imports/CsvImport.php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class CsvImport implements ToCollection
{
    public function collection(Collection $rows)
    {
        return $rows;
        // foreach ($rows as $key => $row) {
        //     // Process each row of the CSV file
        //     if($key > 0) {
        //         dd($row);
        //     }
        // }
    }
}


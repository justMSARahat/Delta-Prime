<?php

namespace App\Exports;

use App\Models\Backend\brand;
use Maatwebsite\Excel\Concerns\FromCollection;

class BrandExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return brand::all();
    }
}

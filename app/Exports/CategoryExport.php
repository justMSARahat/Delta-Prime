<?php

namespace App\Exports;

use App\Models\Backend\category;
use Maatwebsite\Excel\Concerns\FromCollection;

class CategoryExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return category::all();
    }
}

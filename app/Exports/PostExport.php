<?php

namespace App\Exports;

use App\Models\Backend\post;
use Maatwebsite\Excel\Concerns\FromCollection;

class PostExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return post::all();
    }
}

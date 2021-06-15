<?php

namespace App\Imports;

use App\Models\Backend\category;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new category([
            // 'id'            => $row[0],
            // 'title'         => $row[1],
            // 'slug'          => $row[2],
            // 'parent'        => $row[3],
            // 'status'        => $row[4],
            // 'feature'       => $row[5],
            // 'logo'          => $row[6],
            // 'created_at'    => $row[7],
            // 'updated_at'    => $row[8],
        ]);

    }
}

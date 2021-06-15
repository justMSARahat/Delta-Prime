<?php

namespace App\Imports;

use App\Models\Backend\brand;
use Maatwebsite\Excel\Concerns\ToModel;

class BrandImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new brand([
            // 'name'     => $row[0],
            // 'email'    => $row[1],
            // 'password' => $row[2],
        ]);
    }
}

<?php

namespace App\Imports;

use App\Models\Backend\product;
use Maatwebsite\Excel\Concerns\ToModel;

class ProductImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new product([
            // 'name'     => $row[0],
            // 'email'    => $row[1],
            // 'password' => $row[2],
        ]);
    }
}

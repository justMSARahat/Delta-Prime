<?php

namespace App\Imports;

use App\Models\Backend\order;
use Maatwebsite\Excel\Concerns\ToModel;

class OrderImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new order([
            // 'name'     => $row[0],
            // 'email'    => $row[1],
            // 'password' => $row[2],
        ]);
    }
}

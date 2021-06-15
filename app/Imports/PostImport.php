<?php

namespace App\Imports;

use App\Models\Backend\post;
use Maatwebsite\Excel\Concerns\ToModel;

class PostImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new post([
            // 'name'     => $row[0],
            // 'email'    => $row[1],
            // 'password' => $row[2],
        ]);
    }
}

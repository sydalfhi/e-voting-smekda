<?php

namespace App\Imports;

use App\Models\User;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;

class PemilihImportClass implements ToModel
{
    /**
     * @param Collection $collection
     */
    public function model(array $row)
    {
        // Define how to create a model from the Excel row data
        return new User([
            'name' => $row[0],
            'plain_password' => $row[1],
            'role' => 'user',
            'status' => 'N'
            // Add more columns as needed
        ]);
    }
}

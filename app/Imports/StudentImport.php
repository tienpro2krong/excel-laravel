<?php

namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\WithHeadings;

class StudentImport implements ToModel, WithHeadingRow, WithValidation, WithHeadings
{
    public function rules(): array
    {
        return [
            'name' => 'required|unique:students',
            'card' => 'required',
            'phone' => 'required',
            'country' => 'required',
        ];
    }
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        return new Student([
            'name' => $row['name'],
            'card' => $row['card'],
            'phone' => $row['phone'],
            'country' => $row['country'],
        ]);
    }
}
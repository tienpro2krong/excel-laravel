<?php

namespace App\Imports;

use App\Models\Student;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class StudentImport implements ToCollection, WithHeadingRow, WithValidation
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row)
        {
            $data = [
                'name' => $row['name'],
                'gender' => $row['gender'],
                'phone' => $row['phone'],
                'country' => $row['country'],
                'email' => $row['email']
            ];
            Student::create($data);

            
        }
    }

    public function rules(): array
    {
        return [
            'name'=>'required',
            'gender' => 'required',
            'phone' => 'required',
            'country' => 'required',
            'email' => 'required|unique:students,email',
        ];    
    }
}
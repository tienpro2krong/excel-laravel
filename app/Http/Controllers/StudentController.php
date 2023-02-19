<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function index()
    {
        // $students = Student::factory()->count(3)->make();
        return view('welcome');
    }

    public function example()
    {
        $fileName = 'example.xlsx';
        $path = public_path('file/'.$fileName);
        // dd($path);
        return response()->download($path, $fileName, [
            'Content-Type' => '',
            'Content-Disposition' => 'inline; filename="' . $fileName . '"'
        ]);
    }
}
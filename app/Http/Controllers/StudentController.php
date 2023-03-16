<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Imports\StudentImport;
use Maatwebsite\Excel\Facades\Excel;



class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('welcome', compact('students'));
    }

    public function import(Request $request)
    {
        Excel::import(new StudentImport, $request->file('diploma_file'));
        session()->flash('message', 'Excel file have been impoted');
        return back();
    }

    // public function example()
    // {
    //     $fileName = 'example.xlsx';
    //     $path = public_path('file/'.$fileName);
    //     // dd($path);
    //     return response()->download($path, $fileName, [
    //         'Content-Type' => '',
    //         'Content-Disposition' => 'inline; filename="' . $fileName . '"'
    //     ]);
    // }
}
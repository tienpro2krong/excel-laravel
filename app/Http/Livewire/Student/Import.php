<?php

namespace App\Http\Livewire\Student;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use App\Models\Student;
use App\Imports\StudentImport;
use App\Exports\StudentExport;

class Import extends Component
{
    use WithFileUploads;

    public $file;

    public function submit()
    {
        $this->validate([
            'file' => 'required|mimes:xlsx, xls'
        ]);

        Excel::import(new StudentImport, $this->file);
        // dd($this->file);

        session()->flash('message', 'Excel file have been impoted');
    }

    public function export()
    {
        return Excel::download(new StudentExport, 'students.xlsx');
    }

    public function render()
    {
        $students = Student::orderBy('created_at', 'desc')->get();

        return view('livewire.student.import')->with([
            'students' => $students
        ]);
    }
}
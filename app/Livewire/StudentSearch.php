<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class StudentSearch extends Component
{
    public $search = '';

    public $students = [];
    public function updatedSearch()
    {
        if (strlen($this->search) < 2) {
            $this->students = [];
        } else {
            $this->students = Student::where('name', 'like', '%' . $this->search . '%')
                ->orWhere('student_index', 'like', '%' . $this->search . '%')
                ->get();
        }
    }

    public function render()
    {
        return view('livewire.student-search', [
            'students' => $this->students,
        ]);
    }
}

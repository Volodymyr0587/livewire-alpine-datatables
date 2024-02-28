<?php

namespace App\Livewire;

use App\Livewire\Forms\UpdateStudentForm;
use App\Models\Classes;
use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Validate;

class EditStudent extends Component
{
    public Student $student;

    public UpdateStudentForm $form;

    public $class_id;

    public $email;

    public function mount()
    {
        $this->form->setStudent($this->student);

        $this->fill($this->student->only([
            'class_id',
            'email',
        ]));
    }

    public function updateStudent()
    {
        $this->validate([
            'email' => 'required|email|unique:students,email,' . $this->student->id,
            'class_id' => 'required',
        ]);

        $this->form->updateStudent($this->class_id, $this->email);

        $this->redirectRoute('students.index');
    }

    public function updatedClassId($value)
    {
        $this->form->setSections($value);
    }

    public function render()
    {
        return view('livewire.edit-student', [
            'classes' => Classes::all()
        ]);
    }
}

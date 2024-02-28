<?php

namespace App\Livewire;

use App\Models\Classes;
use Livewire\Component;
use Livewire\Attributes\Validate;
use App\Livewire\Forms\CreateStudentForm;

class CreateStudent extends Component
{
    public CreateStudentForm $form;

    #[Validate('required')]
    public $class_id;

    public function addStudent()
    {
        $this->validate();

        $this->form->storeStudent($this->class_id);
        // return redirect(route('students.index'));
        $this->redirectRoute('students.index');
        // $this->redirectRoute(route('students.index'), navigate: true);
    }

    public function updatedClassId($value)
    {
        $this->form->setSections($value);
    }

    public function render()
    {
        return view('livewire.create-student', [
            'classes' => Classes::all()
        ]);
    }
}

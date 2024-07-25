<?php

namespace App\Livewire;

use App\Models\ClassModel;
use App\Models\StudentModel;
use Livewire\Component;
use Livewire\WithPagination;

class StudentLivewire extends Component
{
    use WithPagination;

    public $id, $name, $nik, $gender, $birth_place, $birth_date, $religion, $address, $update = false, $create = false, $search = '', $title = 'Student', $class_id;
    
    protected $rules = [
        'name' => 'required|string',
        'class_id' => 'required|exists:classes,id',
        'gender' => 'required|in:L,P',
        'birth_place' => 'required|string',
        'birth_date' => 'required|date',
        'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Khonghucu',
        'address' => 'required|string'
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->gender = '';
        $this->birth_place = '';
        $this->birth_date = '';
        $this->religion = '';
        $this->address = '';
        $this->class_id = '';

    }

    public function render()
    {
        return view('livewire.student-livewire', [
            'students' => StudentModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
            'title' => $this->title,
            'classes' => ClassModel::latest()->get(),
        ]);
    }
    public function store()
    {
        // Validate Form Request
        $this->validate();
        try {
            StudentModel::create([
                'name' => $this->name,
                'class_id' => $this->class_id,
                'gender' => $this->gender,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'religion' => $this->religion,
                'address' => $this->address
            ]);

            // Set Flash Message
            session()->flash('success', 'Student Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {

            // Set Flash Message
            session()->flash('error', 'Something goes wrong while creating student!!');
            $this->resetFields();
        }
    }

    public function form() {
        $this->create = true;
        $this->update = false;
    }

    public function edit($id) {
        $student = StudentModel::find($id);
        $this->create = false;
        $this->update = true;
        $this->id = $student->id;
        $this->name = $student->name;
        $this->class_id = $student->class_id;
        $this->gender = $student->gender;
        $this->birth_place = $student->birth_place;
        $this->birth_date = $student->birth_date;
        $this->religion = $student->religion;
        $this->address = $student->address;
    }

    public function changed() 
    {
         // Validate request
         $this->validate();
         try{
             // Update category
             StudentModel::find($this->id)->fill([
                'name'=>$this->name,
                'class_id' => $this->class_id,
                'gender' => $this->gender,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'religion' => $this->religion,
                'address' => $this->address
             ])->save();
             session()->flash('success','Student Updated Successfully!!');
     
             $this->update = false;
         }catch(\Exception $e){
             session()->flash('error','Something goes wrong while updating student!!');
             $this->update = false;
         }
    }

    public function destroy($id)
    {
        try {
            StudentModel::find($id)->delete();
            session()->flash('success', "Student Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }
}

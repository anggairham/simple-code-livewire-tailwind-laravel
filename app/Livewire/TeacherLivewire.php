<?php

namespace App\Livewire;

use App\Models\TeacherModel;
use Illuminate\View\View;
use Livewire\Component;
use Livewire\WithPagination;

class TeacherLivewire extends Component
{
    use WithPagination;

    public $id, $name, $nik, $gender, $birth_place, $birth_date, $religion, $address, $update = false, $create = false, $search = '', $title = 'Teacher';

    protected $rules = [
        'name' => 'required|string',
        'nik' => 'required|integer',
        'gender' => 'required|in:L,P',
        'birth_place' => 'required|string',
        'birth_date' => 'required|date',
        'religion' => 'required|in:Islam,Kristen,Katolik,Hindu,Budha,Khonghucu',
        'address' => 'required|string'
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->nik = '';
        $this->gender = '';
        $this->birth_place = '';
        $this->birth_date = '';
        $this->religion = '';
        $this->address = '';
    }

    public function render()
    {
        return view('livewire.teacher-livewire', [
            'teachers' => TeacherModel::where('name', 'like', '%' . $this->search . '%')->paginate(10),
            'title' => $this->title
        ]);
    }
    

    public function store()
    {
        // Validate Form Request
        $this->validate();
        try {
            TeacherModel::create([
                'name' => $this->name,
                'nik' => $this->nik,
                'gender' => $this->gender,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'religion' => $this->religion,
                'address' => $this->address
            ]);

            // Set Flash Message
            session()->flash('success', 'Teacher Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {

            // Set Flash Message
            session()->flash('error', 'Something goes wrong while creating teacher!!');
            $this->resetFields();
        }
    }

    public function form() {
        $this->create = true;
        $this->update = false;
    }

    public function edit($id) {
        $teacher = TeacherModel::find($id);
        $this->create = false;
        $this->update = true;
        $this->id = $teacher->id;
        $this->name = $teacher->name;
        $this->nik = $teacher->nik;
        $this->gender = $teacher->gender;
        $this->birth_place = $teacher->birth_place;
        $this->birth_date = $teacher->birth_date;
        $this->religion = $teacher->religion;
        $this->address = $teacher->address;
    }

    public function changed() 
    {
         // Validate request
         $this->validate();
         try{
             // Update category
             TeacherModel::find($this->id)->fill([
                'name'=>$this->name,
                'nik' => $this->nik,
                'gender' => $this->gender,
                'birth_place' => $this->birth_place,
                'birth_date' => $this->birth_date,
                'religion' => $this->religion,
                'address' => $this->address
             ])->save();
             session()->flash('success','Teacher Updated Successfully!!');
     
             $this->update = false;
         }catch(\Exception $e){
             session()->flash('error','Something goes wrong while updating teacher!!');
             $this->update = false;
         }
    }

    public function destroy($id)
    {
        try {
            TeacherModel::find($id)->delete();
            session()->flash('success', "Teacher Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }
}

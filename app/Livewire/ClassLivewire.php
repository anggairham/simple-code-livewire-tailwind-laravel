<?php

namespace App\Livewire;

use App\Livewire\Auth\Login;
use App\Models\ClassModel;
use App\Models\TeacherModel;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ClassLivewire extends Component
{
    use WithPagination;

    public $id, $name, $teacher_id, $update = false, $create = false, $search = '', $title = 'Class';
    
    protected $rules = [
        'name' => 'required|string',
        'teacher_id' => 'required|exists:teachers,id',
    ];

    public function resetFields()
    {
        $this->name = '';
        $this->teacher_id = '';

    }

    public function render()
    {
        $teachers = TeacherModel::latest()->get();
        return view('livewire.class-livewire', [
            'classes' => ClassModel::where('name', 'like', '%'.$this->search.'%')->paginate(10),
            'title' => $this->title,    
            'teachers' => $teachers,
        ]);
    }
    public function store()
    {
        // Validate Form Request
        $this->validate();
        try {
            ClassModel::create([
                'name' => $this->name,
                'teacher_id' => $this->teacher_id,
            ]);
            // Set Flash Message
            session()->flash('success', 'Class Created Successfully!!');
            $this->resetFields();
        } catch (\Exception $e) {
            dd('ije');
            // Set Flash Message
            session()->flash('error', 'Something goes wrong while creating class!!');
            $this->resetFields();
        }
    }

    public function form() {
        $this->create = true;
        $this->update = false;
    }

    public function edit($id) {
        $class = ClassModel::find($id);
        $this->create = false;
        $this->update = true;
        $this->name = $class->name;
        $this->id = $class->id;
        $this->teacher_id = $class->teacher_id;
    }

    public function changed() 
    {
         // Validate request
         $this->validate();
         try{
             // Update category
             ClassModel::find($this->id)->fill([
                'name' => $this->name,
                'teacher_id' => $this->teacher_id,
             ])->save();
             session()->flash('success','Class Updated Successfully!!');
     
             $this->update = false;
         }catch(\Exception $e){
             session()->flash('error','Something goes wrong while updating class!!');
             $this->update = false;
         }
    }

    public function destroy($id)
    {
        try {
            ClassModel::find($id)->delete();
            session()->flash('success', "Class Deleted Successfully!!");
        } catch (\Exception $e) {
            session()->flash('error', "Something goes wrong!!");
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}

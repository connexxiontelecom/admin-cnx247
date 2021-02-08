<?php

namespace App\Http\Livewire\Backend\Hr;

use Livewire\Component;
use Livewire\WithPagination;
use App\AdminUser;
use Auth;

class Employees extends Component
{
    use WithPagination;
    public $employees;
    public $confirm_from, $confirm_to;
    public $hire_from, $hire_to;
    public $department;
    public $terminated;
    public $resigned;

    public function mount(){
        $this->getEmployees();
    }
    public function render()
    {
        return view('livewire.backend.hr.employees');
    }

    /*
    * Get list of all employees
    */
    public function getEmployees(){
        $this->employees = AdminUser::where('tenant_id',Auth::user()->tenant_id)->orderBy('first_name', 'ASC')->get();

    }

}

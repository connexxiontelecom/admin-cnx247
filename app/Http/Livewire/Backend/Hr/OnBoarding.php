<?php

namespace App\Http\Livewire\Backend\Hr;

use Livewire\Component;
use App\Mail\onBoardEmployee;
use App\AdminUser;
use Auth;

class OnBoarding extends Component
{
    public $first_name, $surname, $email_address, $mobile_no, $position, $department;
    public $hire_date, $birth_date, $start_date;
    public function render()
    {
        return view('livewire.backend.hr.on-boarding');
    }

    public function onBoardStaff(){
        $this->validate([
            'first_name'=>'required',
            'surname'=>'required',
            'email_address'=>'required|email|unique:admin_users,email'
        ]);
        $password = substr(sha1(time()), 32,40);
        $user = new AdminUser;
        $user->first_name = $this->first_name;
        $user->surname = $this->surname;
        $user->email = $this->email_address;
        $user->mobile = $this->mobile_no;
        $user->tenant_id = 0;
        $user->password = bcrypt($password);//random password
        $user->verification_link = substr(sha1(time()), 5,15);
        $user->url = substr(sha1(time()), 29,40);
        $user->save();
        \Mail::to($user)->send(new onBoardEmployee($user, $password));
        session()->flash("success", "<strong>Success!</strong> Onboarding process done.");
        return redirect()->back();
    }
}

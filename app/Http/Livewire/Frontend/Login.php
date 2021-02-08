<?php

namespace App\Http\Livewire\Frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\AdminUser;

class Login extends Component
{
    public $password, $email, $remember;
    public $error;
    public function render()
    {
        return view('livewire.frontend.login');
    }

    /*
    * Login user
    */
    public function loginNow(){
        $this->validate([
            'email'=>'required',
            'password'=>'required'
        ]);
        $user = AdminUser::where('email', $this->email)->first();
        if(!empty($user)){
            //this account is verified
            if(Auth::attempt(['email'=>$this->email, 'password'=>$this->password], $this->remember)){
                    return redirect()->route('my-profile');
            }else{
                $this->error = session()->flash("wrongCredentials", "<strong>Error! </strong> Wrong or invalid login credentials. Try again.");
            }
        }else{
            $this->error = session()->flash("unverified", "<strong>Ooops!</strong> Kindly verify your account in order to login.");
        }

    }
}

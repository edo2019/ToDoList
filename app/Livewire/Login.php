<?php

namespace App\Livewire;

use Livewire\Component;
use Auth;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $remember = false;

    public function login()
    {
        $credentials = ['email' => $this->email, 'password' => $this->password];

        if (Auth::attempt($credentials, $this->remember)) {
            return redirect()->route('todo-list'); // Redirect to the SPA dashboard
        } else {
            session()->flash('error', 'Invalid email or password.');
        }
    }

    public function render()
    {
        return view('livewire.login')->layout('layouts.app'); // Use your SPA layout
    }
   
}

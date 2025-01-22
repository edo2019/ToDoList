<?php

namespace App\Livewire\Profile;

use Livewire\Component;

use Auth;

class UpdateProfile extends Component
{
    public $name, $last_name, $email, $phone, $profession, $profile_photo, $web_url, $password;

    public function mount()
    {
        $user = Auth::user();
        $this->name = $user->name;
        $this->last_name = $user->last_name;
        $this->email = $user->email;
        $this->phone_number = $user->phone_number;
        $this->profession = $user->profession;
        $this->web_url = $user->web_url;
        $this->password = $user->password;
        
    }

    public function updateProfile()
    {
        $user = Auth::user();

        $user->update([
            'name' => $this->first_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'profession' => $this->profession,
            'web_url' => $this->web_url,
            'password' => $this->password ? bcrypt($this->password) : $user->password,
        ]);

        session()->flash('success', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.profile.update-profile')->layout('layouts.app');
    }
   
}

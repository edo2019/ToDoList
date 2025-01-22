<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User;
use Hash;
use Livewire\WithFileUploads;


class RegisterUser extends Component
{
    use WithFileUploads;
    public $name, $second_name, $email, $phone_number, $profession, $profile_photo, $web_url, $password;

    protected $rules = [
        'name' => 'required|string|max:255',
        'second_name' => 'required|string|max:255',
        'email' => 'required|email|unique:users',
        'phone_number' => 'nullable|string|max:15',
        'profession' => 'nullable|string|max:255',
        'profile_photo' => 'nullable|image|max:1024', // Profile photo
        'web_url' => 'nullable|url',
        'password' => 'required|min:6',
    ];

    public function register()
    {
        $this->validate();
        

        User::create([
            'name' => $this->name,
            'second_name' => $this->second_name,
            'email' => $this->email,
            'phone_number' => $this->phone_number,
            'profession' => $this->profession,
            'profile_photo_path' => $this->profile_photo ? $this->profile_photo->store('profile_photos', 'public') : null,
            'web_url' => $this->web_url,
            'password' => Hash::make($this->password),
        ]);

        session()->flash('message', 'User registered successfully.');
        return redirect()->to('/login');
    }


    public function render()
    {
        return view('livewire.register-user')->layout('layouts.app');
    }
}

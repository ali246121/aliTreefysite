<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class UserProfile extends Component
{
    public $name;
    public $email;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);
        Auth::user()->update([
            'name' => $this->name,
            'email' => $this->email,
        ]);


        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.user-profile');
    }
}

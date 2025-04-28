<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class TranslatorProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $languages = [];
    public $cv;

    public function mount()
    {
        $this->name = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->languages = Auth::user()->languages ?? [];
    }

    public function updateProfile()
    {
        $this->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'languages' => 'required|array|min:1',
            'cv' => 'nullable|file|mimes:pdf,doc,docx|max:2048',
        ]);

        $user = Auth::user();

        if ($this->cv) {
            $cvPath = $this->cv->store('cvs', 'public');
            $user->cv = $cvPath;
        }

        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'languages' => $this->languages,
        ]);

        session()->flash('message', 'Profile updated successfully.');
    }

    public function render()
    {
        return view('livewire.translator-profile');
    }
}

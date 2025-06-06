<?php

namespace App\Http\Livewire\LaravelExamples;

use Livewire\Component;

class UserManagement extends Component
{
    public $name = '';
    public $email = '';
    public $role = '';

    protected $rules = [
        'name' => 'required|min:3',
        'email' => 'required|email',
        'role' => 'required|in:admin,creator,member',
    ];

    public function save()
    {
        $this->validate();

        // Here you would typically save the user to the database
        // For now, we'll just reset the form since it's a demo
        $this->reset(['name', 'email', 'role']);

        // Close the modal using JavaScript
        $this->dispatchBrowserEvent('close-modal');
    }

    public function render()
    {
        return view('livewire.laravel-examples.user-management');
    }
}

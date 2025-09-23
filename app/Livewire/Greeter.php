<?php

namespace App\Livewire;

use Livewire\Component;

class Greeter extends Component
{
    public string $name = 'Kevin';

    public function changeName($newName) {
        $this->name = $newName;
    }
    
    public function render()
    {
        return view('livewire.greeter');
    }
}

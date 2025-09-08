<?php

namespace App\Livewire;

use Livewire\Component;

class FirstPage extends Component
{
    public function render()
    {
        return view('livewire.first-page')->layout('components.layouts.app');
    }
}

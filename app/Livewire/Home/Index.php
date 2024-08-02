<?php

namespace App\Livewire\Home;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('components.layouts.app')]
#[Title('Home - SGT')]
class Index extends Component
{
    public function render()
    {
        return view('livewire.home.index');
    }
}

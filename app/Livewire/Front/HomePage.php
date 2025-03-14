<?php

namespace App\Livewire\Front;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{
    #[Layout('frontend.master'),Title('لیست برند ها')]
    public function render()
    {
        return view('livewire.front.home-page');
    }
}

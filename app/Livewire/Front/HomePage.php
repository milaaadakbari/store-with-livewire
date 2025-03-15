<?php

namespace App\Livewire\Front;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class HomePage extends Component
{

    #[Computed(persist: true,seconds: 27000)]
    public function newestProducts(): Collection
    {
        return Product::query()->orderBy('created_at', 'desc')->get();
    }
    #[Layout('frontend.master'),Title('صفحه اصلی')]
    public function render()
    {
        return view('livewire.front.home-page');
    }
}

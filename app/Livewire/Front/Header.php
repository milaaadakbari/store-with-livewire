<?php

namespace App\Livewire\Front;

use App\Models\Category;
use Livewire\Attributes\Computed;
use Livewire\Component;

class Header extends Component
{

    #[Computed(persist: true)]
    public function categories()
    {
        return Category::query()->with('childcategory')
            ->where('parent_id', null)->get();
    }

    public function render()
    {
        return view('livewire.front.header');
    }
}

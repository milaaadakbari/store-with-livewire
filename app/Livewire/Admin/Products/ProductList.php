<?php

namespace App\Livewire\Admin\Products;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductList extends Component
{
    use WithPagination;

    #[Layout('admin.master'),Title('لیست محصولات')]

    public $editIndex;

    public $search;

    #[Computed()]
    public function products():Paginator
    {
        return Product::query()->with('category','brand')->paginate(10);
    }

    #[On('destroy-product')]
    public function DestroyRow($product_id): void
    {
        Product::destroy($product_id);
    }

    public function searchData(): void
    {
        $this->products=Product::query()->where('name','like','%'.$this->search.'%')
            ->with('category','brand')->paginate(10);
    }


    public function render():View
    {

        return view('livewire.admin.products.product-list');
    }
}

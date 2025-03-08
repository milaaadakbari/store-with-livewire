<?php

namespace App\Livewire\Admin\Products;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Contracts\Pagination\Paginator;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class ProductPrices extends Component
{
    use WithPagination;

   public $product;

    public function mount(Product $product)
    {
        $this->product = $product;
   }
    #[Computed()]
    public function productPrices():Paginator
    {
        return ProductPrice::query()->where('product_id',$this->product->id)->paginate(10);
    }

    #[On('destroy-product-Price')]
    public function DestroyRow($product_price_id): void
    {
        ProductPrice::destroy($product_price_id);
    }

    #[Layout('admin.master'),Title('لیست تنوع محصولات')]
    public function render()
    {
        return view('livewire.admin.products.product-prices');
    }
}

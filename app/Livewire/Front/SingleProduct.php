<?php

namespace App\Livewire\Front;

use App\Models\Product;
use App\Models\ProductPrice;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

class SingleProduct extends Component
{
    public Product $product;

    public $selected_color;
    public $selected_guaranty;
    public $discount;
    public $price;
    public $count=1;
    public $product_prices;


    public function mount(): void
    {
        $this->selected_color=$this->product->color_id;
        $this->selected_guaranty=$this->product->guaranty_id;
        $this->discount=$this->product->discount;
        $this->price=$this->product->price;

    }

    public function getProductByColor($color_id): void
    {
        $this->selected_color=$color_id;
        $new_Product=ProductPrice::query()
            ->where('color_id',$color_id)
            ->where('product_id',$this->product->id)
            ->first();
        $this->discount=$new_Product->discount;
        $this->price=$new_Product->price;
        $this->selected_guaranty=$new_Product->guaranty_id;

    }



    #[Layout('frontend.master'),Title('صفحه جزییات محصول')]
    public function render():View
    {
        $this->product_prices=ProductPrice::query()->with('guaranty')
            ->where('color_id','!=',$this->selected_color)
            ->where('product_id',$this->product->id)
            ->get();
        return view('livewire.front.single-product');
    }
}

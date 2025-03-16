<?php

namespace App\Livewire\Front;

use App\Models\Category;
use Illuminate\Contracts\View\View;
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






    public function render():View
    {
        $total_price=0;
        $total_discount=0;
        $carts=collect();
        if(auth()->user()){
            $carts= \App\Models\Cart::query()
                ->with('product.productPrices')
                ->where('user_id',auth()->user()->id)
                ->get();
            foreach($carts as $cart){
                $price=$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->price;
                $total_price +=$price * $cart->count;
                $discount=$cart->product->productPrices->where('color_id', $cart->color_id)->where('guaranty_id',$cart->guaranty_id)->first()->discount;
                $total_discount += (($price * $discount)/100)* $cart->count;
            }
        }

        return view('livewire.front.header',compact('carts','total_price','total_discount'));
    }
}

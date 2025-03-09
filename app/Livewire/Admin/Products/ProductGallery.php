<?php

namespace App\Livewire\Admin\Products;

use App\Models\Gallery;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProductGallery extends Component
{
    use WithFileUploads;
    public $images=[];

    public function createRow()
    {
        if ($this->images) {
            foreach($this->images as $image){
                $name=$this->images->hashName();
                $this->images->storeAs('images/products/',$name,'public');
                Gallery::query()->create([
                    'name'=>$name,
                    'product_id'=>$this->product->id
                ]);
                session()->flash('success', 'گالری جدید ایجاد شد');
            }
        }
    }


    #[Layout('admin.master'),Title('گالری محصول')]
    public function render():View
    {
        return view('livewire.admin.products.product-gallery');
    }
}

<?php

namespace App\Livewire\Admin\Products;

use App\Enums\ProductStatus;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class CreateProduct extends Component
{

    use WithFileUploads;

    #[Layout('admin.master'),Title('ایجاد محصول')]
    #[Validate('required|unique:products,name')]
    public $name;
    #[Validate('required|unique:products,name')]
    public $e_name;

    #[Validate('required')]
    public $price;

    public $discount,$count,$max_sell;

    #[Validate('required|mimes:jpeg,jpg,png')]
    public $image;

    #[Validate('required')]
    public $description;

    #[Validate('required')]
    public $category_id,$brand_id;


    public $editIndex;

    public $search;

    public function createRow(): void
    {
        $this->validate();
        if ($this->image) {
            $image=$this->image->hashName();
            $this->image->storeAs('images/products/',$image,'public');
        }
        Product::query()->create([
            'name' => $this->name,
            'e_name' => $this->e_name,
            'price' => $this->price,
            'discount' => $this->discount,
            'count' => $this->count,
            'max_sell' => $this->max_sell,
            'description' => $this->description,
            'category_id' => $this->category_id,
            'brand_id' =>$this->brand_id,
            'status'=>ProductStatus::ACTIVE->value,
            'slug' => make_slug($this->name),
            'image' => $this->image
        ]);
        session()->flash('success', 'محصول جدید ایجاد شد');
        $this->reset();
        $this->redirect(route('admin.products.list'));
    }


    public function render():View
    {
        $categories = Category::query()
            ->where('parent_id','!=',null)
            ->pluck('name','id');
        $brands = Brand::query()->pluck('name','id');
        return view('livewire.admin.products.create-product',compact('categories','brands'));
    }
}

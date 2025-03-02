<?php

namespace App\Livewire\Admin\Guaranties;

use App\Models\Guaranty;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class GuarantyList extends Component
{
    use WithPagination;

    #[Layout('admin.master'),Title('لیست گارنتی ها')]

    #[Validate('required|unique:guaranties,name')]
    public $name;

    public $editIndex;

    public $search;

    public function createRow(): void
    {
        $this->validate();
        Guaranty::query()->create([
            'name' => $this->name,

        ]);
        session()->flash('success', 'گارانتی جدید ایجاد شد');
        $this->reset();
    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $guaranty=Guaranty::query()->findOrFail($id);
        $this->name=$guaranty->name;

    }

    public function updateRow(): void
    {
        $this->validate();
        $guaranty=Guaranty::query()->findOrFail($this->editIndex);
        $guaranty->update([
            'name' => $this->name,

        ]);
        session()->flash('success', 'گارانتی ویرایش شد');
        $this->reset();

    }


    #[Computed()]
    public function guaranties():Paginator
    {
        return Guaranty::query()->paginate(5);
    }

    #[On('destroy-guaranty')]
    public function DestroyRow($guaranty_id): void
    {
        Guaranty::destroy($guaranty_id);
    }

    public function searchData(): void
    {
        $this->guaranties=Guaranty::query()->where('name','like','%'.$this->search.'%')->paginate(5);
    }
    public function render():View
    {
        return view('livewire.admin.guaranties.guaranty-list');
    }
}

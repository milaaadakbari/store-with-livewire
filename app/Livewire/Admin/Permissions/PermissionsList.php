<?php

namespace App\Livewire\Admin\Permissions;

use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\On;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;

class PermissionsList extends Component
{
    use WithPagination;



    #[Validate('required|unique:guaranties,name')]
    public $name;

    public $editIndex;

    public $search;

    public function createRow(): void
    {
        $this->validate();
        Permission::query()->create([
            'name' => $this->name,

        ]);
        session()->flash('success', 'مجوز جدید ایجاد شد');
        $this->reset();
    }

    public function editRow($id): void
    {
        $this->editIndex = $id;
        $permission=Permission::query()->findOrFail($id);
        $this->name=$permission->name;

    }

    public function updateRow(): void
    {
        $this->validate();
        $permission=Permission::query()->findOrFail($this->editIndex);
        $permission->update([
            'name' => $this->name,

        ]);
        session()->flash('success', 'مجوز ویرایش شد');
        $this->reset();

    }


    #[Computed()]
    public function permissions():Paginator
    {
        return Permission::query()->paginate(5);
    }

    #[On('destroy-permission')]
    public function DestroyRow($permission_id): void
    {
        Permission::destroy($permission_id);
    }

    public function searchData(): void
    {
        $this->permissions=Permission::query()->where('name','like','%'.$this->search.'%')->paginate(5);
    }

    #[Layout('admin.master'),Title('لیست مجوزها')]
    public function render():View
    {
        return view('livewire.admin.permissions.permissions-list');
    }
}

<?php

namespace App\Livewire\Admin\Users;

use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Livewire\WithPagination;

class UserList extends Component
{
    use WithPagination;

    #[Layout('admin.master'),Title('لیست کاربران')]
    #[Validate('required')]
    public $name;
    #[Validate('nullable|unique:users,email')]
    public $email;
    #[Validate('nullable|unique:users,mobile')]
    public $mobile;
    #[Validate('required|min:6')]
    public $password;

    public function CreateUser(): void
    {
        $this->validate();
        User::query()->create([
            'name' => $this->name,
            'email' => $this->email,
            'mobile' => $this->mobile,
            'password' => Hash::make($this->password),
        ]);
        session()->flash('message', 'کاربر جدید ایجاد شد');
        $this->reset();
    }


    #[Computed()]
    public function users():Paginator
    {
        return User::query()->paginate(1);
    }

    public function render(): View
    {
        $users = User::query()->paginate(5);
        return view('livewire.admin.users.user-list');
    }
}

<?php

use App\Livewire\Admin\Panel;
use App\Livewire\Admin\Users\UserList;
use Illuminate\Support\Facades\Route;

Route::get('/', Panel::class)->name('panel');
Route::get('/users', UserList::class)->name('admin.users.list');

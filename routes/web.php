<?php

use App\Livewire\Component\Auth\LoginController;
use App\Livewire\Component\Auth\RegisterController;
use App\Livewire\Component\Members\ListMembers;
use Illuminate\Support\Facades\Route;
use App\Livewire\Component\Home\HomeController;
use App\Livewire\Component\Todos\TodosController;
use App\Livewire\Component\Users\Users;

Route::get('/', LoginController::class)->name('login');
Route::get('/register', RegisterController::class)->name('register');
Route::get('/home', HomeController::class)->middleware('auth')->name('home');
Route::get('/todos', TodosController::class)->middleware('auth')->name('todos');
Route::get('/users', Users::class)->middleware('auth')->name('users');
Route::get('/members', ListMembers::class)->middleware('auth')->name('members');

<?php

use Illuminate\Support\Facades\Route;
use Livewire\Volt\Volt;

Route::redirect('/', 'home');
Volt::route('/', 'home')->name('home');
Volt::route('/search', 'search')->name('search');
Volt::route('/users', 'users')->name('users');

<?php

use Livewire\Volt\Volt;

Volt::route('/', 'home')->name('home');
Volt::route('/search', 'search')->name('search');
Volt::route('/users', 'users')->name('users');

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Page Title' }}</title>

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="container p-2 my-0 mx-auto">
            <nav class="mb-4">
                <a href="/" class="{{ request()->routeIs('home') ? 'active' : '' }}" wire:navigate>Home</a>
                <a href="/search" class="{{ request()->routeIs('search') ? 'active' : '' }}" wire:navigate>Search</a>
                <a href="/users" class="{{ request()->routeIs('users') ? 'active' : '' }}" wire:navigate>Users</a>
            </nav>
            {{ $slot }}
        </div>
    </body>
</html>

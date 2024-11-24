<?php

use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Volt\Component;

new
#[Title('Search - wire:navigate Bug')]
class extends Component {

    #[Url(history: true)]
    public $query = '';

    public function search()
    {

    }

    public function with(): array
    {
        return [
            'md_content' => markdown_convert(resource_path('docs/search.md')),
        ];
    }
}

?>

<div>
    <h1 class="mb-4">Search</h1>
    {!! $md_content !!}
    <p>My search is: <strong>{{ $query }}</strong></p>
    <form wire:submit="search">
        <input class="border" type="text" wire:model="query" placeholder="Search everything">
        <button>Search</button>
    </form>
</div>

<?php

use Illuminate\Database\Eloquent\Model;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Title;
use Livewire\Volt\Component;
use Livewire\WithPagination;
use Sushi\Sushi;

class User extends Model {
    use Sushi;

    protected $rows = [
        ['name' => 'John Doe', 'role' => 'Admin'],
        ['name' => 'Jane Smith', 'role' => 'Editor'],
        ['name' => 'Alice Johnson', 'role' => 'Author'],
        ['name' => 'Bob Brown', 'role' => 'Admin'],
        ['name' => 'Charlie Davis', 'role' => 'Moderator'],
        ['name' => 'Diana Evans', 'role' => 'Subscriber'],
        ['name' => 'Eve Foster', 'role' => 'Admin'],
        ['name' => 'Frank Green', 'role' => 'Editor'],
        ['name' => 'Grace Harris', 'role' => 'Author'],
        ['name' => 'Hank Irvine', 'role' => 'Subscriber'],
        ['name' => 'Ivy Jackson', 'role' => 'Moderator'],
        ['name' => 'Jake Kim', 'role' => 'Editor'],
        ['name' => 'Kara Lee', 'role' => 'Author'],
        ['name' => 'Liam Moore', 'role' => 'Admin'],
        ['name' => 'Mona Nash', 'role' => 'Subscriber'],
        ['name' => 'Nick Owens', 'role' => 'Moderator'],
        ['name' => 'Olivia Parker', 'role' => 'Admin'],
        ['name' => 'Paul Quinn', 'role' => 'Editor'],
        ['name' => 'Quincy Reed', 'role' => 'Author'],
        ['name' => 'Rita Scott', 'role' => 'Moderator'],
        ['name' => 'Sam Turner', 'role' => 'Admin'],
        ['name' => 'Tina Underwood', 'role' => 'Editor'],
        ['name' => 'Uma Valdez', 'role' => 'Subscriber'],
        ['name' => 'Victor White', 'role' => 'Admin'],
        ['name' => 'Wendy Xander', 'role' => 'Moderator'],
        ['name' => 'Xavier Young', 'role' => 'Editor'],
        ['name' => 'Yara Zane', 'role' => 'Author'],
        ['name' => 'Zack Allen', 'role' => 'Subscriber'],
        ['name' => 'Amber Baker', 'role' => 'Admin'],
        ['name' => 'Ben Carson', 'role' => 'Moderator'],
        ['name' => 'Cathy Donovan', 'role' => 'Author'],
        ['name' => 'David Ellis', 'role' => 'Editor'],
        ['name' => 'Erin Fisher', 'role' => 'Subscriber'],
        ['name' => 'Fred Garner', 'role' => 'Moderator'],
        ['name' => 'Gina Holmes', 'role' => 'Admin'],
        ['name' => 'Howard Ingram', 'role' => 'Author'],
        ['name' => 'Iris Jacobs', 'role' => 'Editor'],
        ['name' => 'Jack King', 'role' => 'Subscriber'],
    ];
}


new
#[Title('Users - wire:navigate Bug')]
class extends Component {
    use WithPagination;

    #[Computed()]
    public function users()
    {
        return User::query()->paginate();
    }

    public function with(): array
    {
        return [
            'md_content' => markdown_convert(resource_path('docs/users.md')),
        ];
    }
}
?>

<div>
    <h1 class="mb-4">Users</h1>
    {!! $md_content !!}
    <table>
        <thead>
            <th>
                Name
            </th>
            <th>
                Role
            </th>
        </thead>
        <tbody>
            @foreach ($this->users as $user)
            <tr>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    {{ $this->users->links() }}
</div>

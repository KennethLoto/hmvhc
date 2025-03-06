<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;

class UsersTable extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public $role = '';

    // protected $paginationTheme = 'bootstrap';

    public function render()
    {

        return view('livewire.users-table', [
            'users' => User::when($this->search, function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhere('created_at', 'like', '%' . $this->search . '%')
                    ->orWhere('email_verified_at', 'like', '%' . $this->search . '%')
                    ->orWhere('role', 'like', '%' . $this->search . '%');
            })
                ->when($this->role, function ($query) {
                    $query->where('role', $this->role);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),

            'roles' => User::select('role')->distinct()->pluck('role'),
        ]);
    }
}

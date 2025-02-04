<?php

namespace App\Livewire\admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersIndex extends Component
{
    use WithPagination;

    //* Propiedades
    protected $paginationTheme = "bootstrap";

    public $search;

    public function render()
    {
        $searchTerm = trim($this->search);

        $users = User::where('name', 'LIKE', '%' . $searchTerm . '%')
            ->orWhere('email', 'LIKE', '%' . $searchTerm . '%')
            ->paginate(8);

        return view('livewire.admin.users-index', compact('users'));
    }
    public function limpiar_page(){
        $this->resetPage();
    }
}

<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\UserCard;
use Livewire\WithPagination;

class UserCardIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingUserCard;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingUserCard = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(UserCard $userCard)
    {
        $userCard->delete();

        $this->confirmingDeletion = false;
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortDirection =
                $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortDirection = 'asc';
        }

        $this->sortField = $field;
    }

    public function getRowsProperty()
    {
        return $this->rowsQuery->paginate(5);
    }

    public function getRowsQueryProperty()
    {
        return UserCard::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('holder_name', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.user-cards.index', [
            'userCards' => $this->rows,
        ]);
    }
}

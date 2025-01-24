<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\Iinfluencer;
use Livewire\WithPagination;

class IinfluencerIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingIinfluencer;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingIinfluencer = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(Iinfluencer $iinfluencer)
    {
        $iinfluencer->delete();

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
        return Iinfluencer::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('name', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.iinfluencers.index', [
            'iinfluencers' => $this->rows,
        ]);
    }
}

<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use App\Models\SubService;
use Livewire\WithPagination;

class SubServiceIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingSubService;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingSubService = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(SubService $subService)
    {
        $subService->delete();

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
        return SubService::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('name', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.sub-services.index', [
            'subServices' => $this->rows,
        ]);
    }
}

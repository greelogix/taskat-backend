<?php

namespace App\Livewire\Dashboard;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\SubServiceTemplate;

class SubServiceTemplateIndex extends Component
{
    use WithPagination;

    public $search;
    public $sortField = 'updated_at';
    public $sortDirection = 'desc';

    public $queryString = ['search', 'sortField', 'sortDirection'];

    public $confirmingDeletion = false;
    public $deletingSubServiceTemplate;

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function confirmDeletion(string $id)
    {
        $this->deletingSubServiceTemplate = $id;

        $this->confirmingDeletion = true;
    }

    public function delete(SubServiceTemplate $subServiceTemplate)
    {
        $subServiceTemplate->delete();

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
        return SubServiceTemplate::query()
            ->orderBy($this->sortField, $this->sortDirection)
            ->where('name', 'like', "%{$this->search}%");
    }

    public function render()
    {
        return view('livewire.dashboard.sub-service-templates.index', [
            'subServiceTemplates' => $this->rows,
        ]);
    }
}

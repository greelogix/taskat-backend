<?php

namespace App\Livewire\Dashboard\ContentCategories\Forms;

use Livewire\Form;
use Livewire\Attributes\Rule;
use App\Models\ContentCategory;

class CreateForm extends Form
{
    #[Rule('required|string')]
    public $name = '';

    #[Rule('required|string')]
    public $decription = '';

    #[Rule('required')]
    public $status = '';

    public function save()
    {
        $this->validate();

        $contentCategory = ContentCategory::create($this->except([]));

        $this->reset();

        return $contentCategory;
    }
}

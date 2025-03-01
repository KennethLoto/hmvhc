<?php

namespace App\Livewire;

use App\Models\TypesOfDisease;
use Livewire\Component;
use Livewire\WithPagination;

class TypesOfDiseasesTable extends Component
{
    use WithPagination;

    public $search = '';

    public $perPage = 5;

    public function render()
    {
        return view('livewire.types-of-diseases-table', [
            'typesOfDiseases' => TypesOfDisease::when($this->search, function ($query) {
                $query->where('nameOfDisease', 'like', '%' . $this->search . '%');
            })->orderBy('created_at', 'desc')->paginate($this->perPage),
        ]);
    }
}

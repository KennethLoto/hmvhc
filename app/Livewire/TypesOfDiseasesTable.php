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
    public $category = '';

    public function render()
    {
        return view('livewire.types-of-diseases-table', [
            'typesOfDiseases' => TypesOfDisease::when($this->search, function ($query) {
                $query->where('nameOfDisease', 'like', '%' . $this->search . '%');
            })
                ->when($this->category, function ($query) {
                    $query->where('category', $this->category);
                })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),

            'categories' => TypesOfDisease::select('category')->distinct()->pluck('category'),
        ]);
    }
}

<?php

namespace App\Livewire;

use App\Models\PatientsInfo;
use Livewire\Component;

class PatientsInfoTable extends Component
{
    public $search = '';
    public $perPage = 5;

    public function render()
    {
        return view('livewire.patients-info-table', [
            'patientsInfos' => PatientsInfo::when($this->search, function ($query) {
                $query->where('firstName', 'like', '%' . $this->search . '%')
                    ->orWhere('middleName', 'like', '%' . $this->search . '%')
                    ->orWhere('lastName', 'like', '%' . $this->search . '%')
                    ->orWhere('suffix', 'like', '%' . $this->search . '%')
                    ->orWhere('province', 'like', '%' . $this->search . '%')
                    ->orWhere('suffix', 'like', '%' . $this->search . '%')
                    ->orWhere('barangay', 'like', '%' . $this->search . '%')
                    ->orWhere('street', 'like', '%' . $this->search . '%')
                    ->orWhere('contactNumber', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%');
            })
                ->orderBy('created_at', 'desc')
                ->paginate($this->perPage),
        ]);
    }
}

<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Division;
use Livewire\WithPagination;

class DivisionTable extends Component
{
    use WithPagination;

    public $search = '';

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $divisions = Division::where('name', 'like', '%' . $this->search . '%')
            ->orWhere('abbr', 'like', '%' . $this->search . '%')
            ->orderBy('name')
            ->paginate(10);

        return view('livewire.division-table', [
            'divisions' => $divisions
        ]);
    }
}
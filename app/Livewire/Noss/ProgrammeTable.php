<?php

namespace App\Livewire\Noss;

use App\Models\Unit;
use Livewire\Component;
use App\Models\Observer;
use App\Models\Programme;
use Livewire\WithPagination;

class ProgrammeTable extends Component
{
    use WithPagination;

    public $search = '';
    public $filterUnit = '';
    public $filterObserver = '';
    

    protected $updatesQueryString = ['search'];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Programme::with(['unit', 'cordinator', 'observers'])
            ->when($this->search, fn($q) =>
                $q->whereHas('unit', fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                  ->orWhereHas('cordinator', fn($q) => $q->where('name', 'like', "%{$this->search}%"))
                  ->orWhere('report', '=', filter_var($this->search, FILTER_VALIDATE_BOOLEAN))
            )
            ->when($this->filterUnit, fn($q) =>
                $q->where('unit_id', $this->filterUnit)
            )
            ->when($this->filterObserver, fn($q) =>
                $q->whereHas('observers', fn($q) => $q->where('id', $this->filterObserver))
            )
            ->orderBy('date_start', 'desc')
            ->paginate(10);
    
        return view('livewire.noss.programme-table', [
            'programmes' => $query,
            'units' => Unit::all(),
            'observers' => Observer::all(),
        ]);
    }
}

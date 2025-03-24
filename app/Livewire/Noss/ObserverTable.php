<?php

namespace App\Livewire\Noss;

use Livewire\Component;
use App\Models\Observer;
use Livewire\WithPagination;

class ObserverTable extends Component
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
        $observers = Observer::with('user')
            ->whereHas('user', function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
            })
            ->orWhere('callsign', 'like', '%' . $this->search . '%')
            ->orderBy('callsign')
            ->paginate(10);

        return view('livewire.noss.observer-table', compact('observers'));
    }
}

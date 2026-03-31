<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Repair;

class PriceListPopup extends Component
{
    use WithPagination;

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $repairs = Repair::query()
            ->with(['deviceModel.brand', 'serviceType'])
            ->where('is_active', true)
            ->where(function ($query) {
                if (!empty($this->search)) {
                    $query->whereHas('deviceModel', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    })
                    ->orWhereHas('serviceType', function ($q) {
                        $q->where('name', 'like', '%' . $this->search . '%');
                    });
                }
            })
            ->orderBy('id', 'desc')
            ->paginate(15);

        return view('livewire.price-list-popup', [
            'repairs' => $repairs
        ]);
    }
}

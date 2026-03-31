<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Repair;
use App\Models\ServiceType;
use App\Models\DeviceModel;

class PriceListPopup extends Component
{
    use WithPagination;

    public $search = '';
    public $serviceFilter = '';
    public $deviceFilter = '';
    public $perPage = 15;

    public function loadMore()
    {
        $this->perPage += 15;
    }

    public function updating($field)
    {
        if (in_array($field, ['search', 'serviceFilter', 'deviceFilter'])) {
            $this->resetPage();
            $this->perPage = 15;
        }
    }

    public function render()
    {
        $serviceTypes = ServiceType::where('is_active', true)->orderBy('name')->get();
        $deviceModels = DeviceModel::where('is_active', true)->orderBy('name')->get();

        $query = Repair::query()
            ->with(['deviceModel.brand', 'serviceType'])
            ->where('is_active', true);

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->whereHas('deviceModel', function ($q2) {
                    $q2->where('name', 'like', '%' . $this->search . '%');
                })
                ->orWhereHas('serviceType', function ($q2) {
                    $q2->where('name', 'like', '%' . $this->search . '%');
                });
            });
        }

        if (!empty($this->serviceFilter)) {
            $query->where('service_type_id', $this->serviceFilter);
        }

        if (!empty($this->deviceFilter)) {
            $query->where('device_model_id', $this->deviceFilter);
        }

        $repairs = $query->orderBy('id', 'asc')->paginate($this->perPage);

        return view('livewire.price-list-popup', [
            'repairs' => $repairs,
            'serviceTypes' => $serviceTypes,
            'deviceModels' => $deviceModels,
        ]);
    }
}

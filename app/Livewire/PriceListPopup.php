<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Repair;
use App\Models\ServiceType;
use App\Models\DeviceModel;

class PriceListPopup extends Component
{
    public $search = '';
    public $serviceFilter = '';
    public $deviceFilter = '';

    public function resetFilters()
    {
        $this->search = '';
        $this->serviceFilter = '';
        $this->deviceFilter = '';
    }

    public function updating($field)
    {
        // State updates trigger standard re-render
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

        $repairs = $query->orderBy('id', 'asc')->get();

        return view('livewire.price-list-popup', [
            'repairs' => $repairs,
            'serviceTypes' => $serviceTypes,
            'deviceModels' => $deviceModels,
        ]);
    }
}

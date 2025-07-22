<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ShowServiceDetail extends Component
{
    public $service;
    public function mount($id)
    {
        $this->service = Service::findOrFail($id);
        // dd($this->service);
    }
    public function render()
    {
        $data["service"] = $this->service;
        return view('livewire.show-service-detail', $data);
    }
}

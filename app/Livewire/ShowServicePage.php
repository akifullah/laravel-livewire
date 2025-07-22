<?php

namespace App\Livewire;

use App\Models\Service;
use Livewire\Component;

class ShowServicePage extends Component
{
    public function render()
    {
        $data["services"] = Service::latest()->get();
        return view('livewire.show-service-page', $data);
    }
}

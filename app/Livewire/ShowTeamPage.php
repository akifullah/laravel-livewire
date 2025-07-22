<?php

namespace App\Livewire;

use App\Models\Member;
use Livewire\Component;

class ShowTeamPage extends Component
{
    public function render()
    {
        $data["teams"] = Member::whereStatus(1)->latest()->get();
        return view('livewire.show-team-page', $data);
    }
}

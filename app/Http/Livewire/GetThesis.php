<?php

namespace App\Http\Livewire;

use App\Models\Thesis;
use Livewire\Component;

class GetThesis extends Component
{
    protected $thesis;

    public function render()
    {
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(40);
        return view('livewire.get-thesis')->with('thesis',$r);
    }
}

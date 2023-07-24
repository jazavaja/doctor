<?php

namespace App\Http\Livewire;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class GetThesis extends Component
{
    use WithPagination;
    protected $thesis;

    public function render()
    {
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(40);
        return view('livewire.get-thesis')->with('thesis2',$r);
    }
}

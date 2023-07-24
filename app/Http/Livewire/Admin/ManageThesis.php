<?php

namespace App\Http\Livewire\Admin;

use App\Models\Thesis;
use Livewire\Component;

class ManageThesis extends Component
{
    protected $thesis;



    public function render()
    {
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(40);
        return view('livewire.admin.manage-thesis')->with('thesis',$r);
    }
}

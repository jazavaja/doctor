<?php

namespace App\Http\Livewire\Admin;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class ManageThesis extends Component
{
    use WithPagination;
    protected $thesis;



    public function delete($id)
    {
        Thesis::find($id)->delete();
    }

    public function render()
    {
        $r=Thesis::with('guideMasterUser')->with('consultantMasterUser')->with('category')->paginate(40);
        return view('livewire.admin.manage-thesis')->with('thesis',$r);
    }

}

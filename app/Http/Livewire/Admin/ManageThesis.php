<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class ManageThesis extends Component
{

    public $creatorName;
    public $titleThesis;
    public $guideMasterUserId;
    public $consultantMasterUserId;
    public $category_id;
    public $dateOfRegister;
    public $DefenseDate;
    public $type;

    public function render()
    {
        return view('livewire.admin.manage-thesis');
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Imports\PlanImport;
use App\Imports\ProposalImport;
use App\Models\Plan;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreatePlanGroup extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];


    public function upload()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $this->file->store('public');

        $ff=storage_path('app/' . $path);


        $import = new PlanImport();
        Excel::import($import, $ff);

    }

    public function deleteAllPlan(){
        Plan::query()->delete();
    }

    public function render()
    {
        return view('livewire.admin.create-plan-group');
    }
}

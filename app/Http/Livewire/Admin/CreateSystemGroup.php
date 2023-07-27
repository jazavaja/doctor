<?php

namespace App\Http\Livewire\Admin;

use App\Imports\SystemImport;
use App\Models\System;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateSystemGroup extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];
    protected $system;

    public function upload()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $this->file->store('public');

        $ff=storage_path('app/' . $path);


        $import = new SystemImport();
        Excel::import($import, $ff);

// Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function deleteAllSystems(){
        System::query()->delete();
    }
    public function render()
    {
        $this->system=System::take(20)->get();
        return view('livewire.admin.create-system-group')->with('system',$this->system);
    }
}

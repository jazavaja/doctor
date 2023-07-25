<?php

namespace App\Http\Livewire\Admin;

use App\Imports\ProposalImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateProposalGroup extends Component
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


        $import = new ProposalImport();
        Excel::import($import, $ff);

// Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function render()
    {
        return view('livewire.admin.create-proposal-group');
    }
}

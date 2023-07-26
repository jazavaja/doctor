<?php

namespace App\Http\Livewire\Admin;

use App\Imports\ThesisImport;
use App\Imports\UsersImport;
use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateThesisGroup extends Component
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


        $import = new ThesisImport();
        Excel::import($import, $ff);

// Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function deleteAllThesis(){
        Thesis::truncate();
    }
    public function render()
    {
        return view('livewire.admin.create-thesis-group');
    }
}

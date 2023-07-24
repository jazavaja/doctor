<?php

namespace App\Http\Livewire\Admin;

use App\Imports\UsersImport;
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

        Excel::import(new UsersImport, $ff);

//        \Log::info(dd($this->data));

//        dd($this->data);
        // Process the uploaded file using Maatwebsite\Excel
//        session()->flash('success', 'File uploaded successfully!');

    }

    public function render()
    {
        return view('livewire.admin.create-thesis-group');
    }
}

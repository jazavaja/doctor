<?php

namespace App\Http\Livewire\Admin;

use App\Imports\ThesisImport;
use App\Imports\UsersImport;
use App\Jobs\ProcessThesisData;
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

        ProcessThesisData::dispatch($path);

        session()->flash('message', 'File uploaded and processing has been queued.');
    }

    public function deleteAllThesis(){
        Thesis::query()->delete();
    }
    public function render()
    {
        return view('livewire.admin.create-thesis-group');
    }
}

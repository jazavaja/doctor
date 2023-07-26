<?php

namespace App\Http\Livewire\Admin;

use App\Imports\PositionImport;
use App\Models\Position;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreatePositionGroup extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];
    protected $positions;

    public function upload()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $this->file->store('public');

        $ff=storage_path('app/' . $path);


        $import = new PositionImport();
        Excel::import($import, $ff);

// Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function deletePositions(){
        Position::query()->delete();
    }
    public function render()
    {
        $this->positions=Position::take(20)->get();
        return view('livewire.admin.create-position-group')->with('positions',$this->positions);
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Imports\CategoryImport;
use App\Imports\UsersImport;
use App\Jobs\ProcessMasterData;
use App\Models\Category;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateMasterGroup extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];
    protected $masters;

    public function upload()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $this->file->store('public');

        $ff=storage_path('app/' . $path);


        $import = new UsersImport();
        Excel::import($import, $ff);

        // Get the total number of rows created

        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function deleteMasters(){
        User::where('role','=',1)->delete();
    }

    public function render()
    {
        $this->masters=User::where('role','=',1)->take(20)->get();
        return view('livewire.admin.create-master-group')->with('masters',$this->masters);
    }
}

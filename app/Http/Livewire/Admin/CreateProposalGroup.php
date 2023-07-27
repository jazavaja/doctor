<?php

namespace App\Http\Livewire\Admin;

use App\Imports\ProposalImport;
use App\Models\Proposal;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Maatwebsite\Excel\Facades\Excel;

class CreateProposalGroup extends Component
{

    use WithPagination;
    use WithFileUploads;

    protected $proposal;
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

    public function deleteProposals(){
        Proposal::query()->delete();
    }

    public function delete($id){
        Proposal::find($id)->delete();
    }

    public function render()
    {
        $this->proposal=Proposal::paginate(7);
        return view('livewire.admin.create-proposal-group')->with('proposal',$this->proposal);
    }

}

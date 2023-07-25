<?php

namespace App\Http\Livewire;

use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class GetThesis extends Component
{
    use WithPagination;
    protected $thesis;
    public $search_input;

    public function doSearch()
    {
        $searchName = $this->search_input;

        $ooo= Thesis::with('guideMasterUser')
            ->with('consultantMasterUser')
            ->with('category')
            ->whereHas('guideMasterUser', function ($query) use ($searchName) {
                $query->where('name', 'like', '%' . $searchName . '%');
            })
            ->orWhereHas('consultantMasterUser', function ($query) use ($searchName) {
                $query->where('name', 'like', '%' . $searchName . '%');
            })
            ->orWhere('titleThesis','like', '%' . $searchName . '%');

        $this->thesis = $ooo->paginate(40);

    }

    public function render()
    {
        // Only fetch the Thesis records if the search has been performed
        if ($this->search_input) {
            $this->doSearch();
            return view('livewire.get-thesis')->with('thesis2', $this->thesis);
        }

        // If no search has been performed, fetch all Thesis records
        $this->thesis = Thesis::with('guideMasterUser')
            ->with('consultantMasterUser')
            ->with('category')
            ->paginate(40);

        return view('livewire.get-thesis')->with('thesis2', $this->thesis);
    }
}

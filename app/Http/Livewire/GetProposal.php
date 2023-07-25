<?php

namespace App\Http\Livewire;

use App\Models\Proposal;
use App\Models\Thesis;
use Livewire\Component;

class GetProposal extends Component
{
    public $search;
    protected $proposal;

    public function doSearch()
    {
        $searchName = $this->search;

        $ooo= Proposal::with('position')
            ->with('system')
            ->orWhere('tracking_code','=',  $searchName )
            ->orWhere('title_proposal','like', '%' . $searchName . '%')
            ->orWhere('researcher','like', '%' . $searchName . '%')
        ;

        $this->proposal = $ooo->paginate(40);
    }

    public function render()
    {
        // Only fetch the Thesis records if the search has been performed
        if ($this->search) {
            $this->doSearch();
            return view('livewire.get-proposal')->with('proposal', $this->proposal);
        }

        $this->proposal= Proposal::with('position')
            ->with('system')->paginate(40);

        return view('livewire.get-proposal')->with('proposal',$this->proposal);
    }
}

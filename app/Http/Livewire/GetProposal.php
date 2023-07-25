<?php

namespace App\Http\Livewire;

use App\Models\Proposal;
use Livewire\Component;

class GetProposal extends Component
{
    public $search;


    public function doSearch()
    {
        $searchName = $this->search;

        $ooo= Proposal::with('position')
            ->with('system')
            ->orWhere('tracking_code','=',  $searchName )
            ->orWhere('title_proposal','like', '%' . $searchName . '%')
            ->orWhere('researcher','like', '%' . $searchName . '%')
        ;

        $this->thesis = $ooo->paginate(40);
    }

    public function render()
    {
        return view('livewire.get-proposal');
    }
}

<?php

namespace App\Http\Livewire;

use Livewire\Component;

class GetProposal extends Component
{
    public $search;


    public function doSearch()
    {

    }

    public function render()
    {
        return view('livewire.get-proposal');
    }
}

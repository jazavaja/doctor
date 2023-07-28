<?php

namespace App\Http\Livewire;

use App\Models\Plan;
use App\Models\Thesis;
use Livewire\Component;
use Livewire\WithPagination;

class GetPlan extends Component
{
    use WithPagination;
    protected $plan;
    public $search_input;


    public function doSearch()
    {
        $searchName = $this->search_input;

        $ooo= Plan::where('title_plan','like','%',$searchName,'%')
            ->orWhere('name_project_manager','like', '%' . $searchName . '%')
        ;

        $this->thesis = $ooo->paginate(40);

    }
    public function render()
    {
        $this->plan=Plan::paginate(20);
        return view('livewire.get-plan')->with('plan',$this->plan);
    }
}

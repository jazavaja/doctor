<?php

namespace App\Http\Livewire\Admin;

use App\Models\Thesis;
use App\Providers\GeneralMethod;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class ManageThesis extends Component
{

    public $creatorName;
    public $titleThesis;
    public $guideMasterUserId;
    public $consultantMasterUserId;
    public $category_id;
    public $dateOfRegister;
    public $defenseDate;

    public $resultDateOfRegister;
    public $resultDefenseDate;

    public $type;

    public function setInitDate(){
        if ($this->defenseDate == null){
            $this->resultDefenseDate = now();
        }
        else
        {
            Log::info($this->defenseDate);
            $this->resultDefenseDate = Jalalian::fromFormat('Y/m/d'
                , GeneralMethod::forNumbers($this->defenseDate))->toCarbon();
        }
        if ($this->dateOfRegister== null)
        {
            $this->resultDateOfRegister= now();
        }
        else
        {
            $this->resultDateOfRegister = Jalalian::fromFormat('Y/m/d'
                ,GeneralMethod::forNumbers($this->dateOfRegister) )->toCarbon();

        }
    }

    public function render()
    {
        return view('livewire.admin.manage-thesis');
    }

    public function submit(){
        $this->setInitDate();
        Thesis::create([
           'creatorName'=>$this->creatorName,
            'titleThesis'=>$this->titleThesis,
            'guideMasterUserId'=>$this->guideMasterUserId,
            'category_id'=>$this->category_id,
            'dateOfRegister'=>$this->resultDateOfRegister,
            'DefenseDate'=>$this->resultDefenseDate
        ]);

    }
}

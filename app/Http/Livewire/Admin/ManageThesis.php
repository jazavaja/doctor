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

    public $success=null;

    protected $rules = [
        'creatorName' => 'required|string',
        'titleThesis' => 'required|string',
        'guideMasterUserId' => 'required|integer',
        'consultantMasterUserId' => 'nullable|integer',
        'category_id' => 'required|integer',
        'dateOfRegister' => 'nullable|string',
        'defenseDate' => 'nullable|string',
    ];

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

    public function submit()
    {
        $this->setInitDate();

        $this->validate(); // Validate the form fields based on the rules

        try {
            Thesis::create([
                'creatorName' => $this->creatorName,
                'titleThesis' => $this->titleThesis,
                'guideMasterUserId' => $this->guideMasterUserId,
                'category_id' => $this->category_id,
                'dateOfRegister' => $this->resultDateOfRegister,
                'DefenseDate' => $this->resultDefenseDate,
            ]);

            // Clear form fields after successful submission if needed
            $this->reset();

            $this->success=1;
            // You can also add a success message if desired
            // session()->flash('success', 'Thesis submitted successfully!');
        } catch (\Exception $exception) {
            // Add the error to the Livewire error bag
            $this->addError('submit', 'An error occurred while submitting the thesis.');

            // Log the error for debugging purposes (optional)
            Log::error($exception->getMessage());
        }
    }
}

<?php

namespace App\Http\Livewire\Admin;

use App\Models\Category;
use App\Models\Thesis;
use App\Models\User;
use App\Providers\GeneralMethod;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Morilog\Jalali\Jalalian;

class CreateThesisOne extends Component
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
    protected $listCategory;
    protected $listUsers;

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

    public function submit()
    {
        $this->setInitDate();

        $this->validate(); // Validate the form fields based on the rules

        try {
            Thesis::create([
                'creatorName' => $this->creatorName,
                'titleThesis' => $this->titleThesis,
                'guideMasterUserId' => $this->guideMasterUserId,
                'consultantMasterUserId'=>$this->consultantMasterUserId,
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


    public function getCategory(){
        return $this->listCategory=Category::get();
    }
    public function getUsers(){
        return $this->listUsers=User::get();
    }
    public function render()
    {
        $this->getCategory();
        $this->getUsers();
        return view('livewire.admin.create-thesis-one')
            ->with('listCategory',$this->listCategory)
            ->with('listUsers',$this->listUsers)
            ;
    }
}

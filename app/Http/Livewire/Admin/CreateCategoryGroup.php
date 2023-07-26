<?php

namespace App\Http\Livewire\Admin;

use App\Imports\CategoryImport;
use App\Models\Category;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateCategoryGroup extends Component
{
    use WithFileUploads;

    public $file;
    public $data = [];
    protected $category;

    public function upload()
    {
        $this->validate([
            'file' => 'required|mimes:xls,xlsx'
        ]);

        $path = $this->file->store('public');

        $ff=storage_path('app/' . $path);


        $import = new CategoryImport();
        Excel::import($import, $ff);

// Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

    }

    public function deleteCategory(){
        Category::query()->delete();
    }

    public function render()
    {
        $this->category=Category::take(20)->get();
        return view('livewire.admin.create-category-group')->with('category',$this->category);
    }
}

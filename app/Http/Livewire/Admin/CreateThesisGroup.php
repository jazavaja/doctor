<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class CreateThesisGroup extends Component
{

    use WithFileUploads;
    public $file;

    public function submit()
    {
        $this->validate([
            'file' => 'required|file',
        ]);


        // Get the path of the uploaded file
        $filePath = $this->file->getRealPath();

        \Log::info($filePath);
        // Read the contents of the Excel file using Maatwebsite\Excel
        $data = Excel::toArray([], $filePath);

        // $data will now contain an array representing the data in the Excel file
        // Each element of the array corresponds to a row in the Excel file

        // Process the data as needed
        foreach ($data[0] as $row) {
            \Log::info("AAA".$row);
            // $row is an array representing the data of each row in the Excel file
            // Do something with each row, e.g., display or manipulate the data
        }

        return redirect()->back()->with('success', 'Excel file read successfully.');
    }

    public function render()
    {
        return view('livewire.admin.create-thesis-group');
    }
}

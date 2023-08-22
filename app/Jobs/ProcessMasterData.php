<?php

namespace App\Jobs;

use App\Imports\UsersImport; // Import the necessary class for your UsersImport
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel; // Import the Excel facade

class ProcessMasterData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $timeout = 600;
    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function handle()
    {
        $ff = storage_path('app/' . $this->path);

        $import = new UsersImport();
        Excel::import($import, $ff);

        // Get the total number of rows created
        $rowCount = $import->getRowCountSuccess();
        $fail = $import->getRowCountFail();

        // Delete the uploaded file after processing
        Storage::disk('public')->delete($this->path);
    }
}

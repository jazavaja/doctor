<?php

namespace App\Jobs;

use App\Imports\ThesisImport;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

// Import the UploadedFile class

class ProcessThesisData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $path;

    public function __construct($path)
    {
        $this->path = $path;
    }

    public function handle()
    {
        $ff = storage_path('app/' . $this->path);

        $import = new ThesisImport();
        Excel::import($import, $ff);

        Storage::disk('public')->delete($this->path);
    }
}

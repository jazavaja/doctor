<?php

namespace App\Imports;

use App\Jobs\CreateThesisJob;
use Maatwebsite\Excel\Concerns\ToModel;
use Illuminate\Support\Facades\Log;

class ThesisImport implements ToModel
{
    /**
     * @param \Maatwebsite\Excel\Row $row
     */

    private $rowCountSuccess = 0; // Initialize the row count property
    private $rowCountFail = 0; // Initialize the row count property

    public function model(array $row)
    {
        Log::info("ThesisImport log in toModel");
        [$creatorName,$titleThesis,$category_id,$guideMasterUserId,$consultantMasterUserId,$dateOfRegister,$defenseDate] = $row;

        $rowData = [$creatorName, $titleThesis, $category_id, $guideMasterUserId, $consultantMasterUserId, $dateOfRegister, $defenseDate];
        CreateThesisJob::dispatch($rowData);

    }

    public function getRowCountSuccess(): int
    {
        return $this->rowCountSuccess;
    }

    public function getRowCountFail(): int
    {
        return $this->rowCountFail;
    }
}

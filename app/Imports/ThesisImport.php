<?php

namespace App\Imports;

use App\Jobs\CreateThesisJob;
use App\Models\Thesis;
use App\Providers\GeneralMethod;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\OnEachRow;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Morilog\Jalali\Jalalian;
use PhpOffice\PhpSpreadsheet\Shared\Date;
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

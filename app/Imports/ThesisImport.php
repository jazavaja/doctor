<?php

namespace App\Imports;

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

        $resR = null;
        $resD = null;

        if ($dateOfRegister !== null) {
            try {
                $resR = Jalalian::fromFormat('Y/m/d', GeneralMethod::forNumbers($dateOfRegister))->toCarbon();
            } catch (\Exception $exception) {

            }
        }

        if ($defenseDate !== null) {
            try {
                $resD = Jalalian::fromFormat('Y/m/d', GeneralMethod::forNumbers($defenseDate))->toCarbon();
            } catch (\Exception $exception) {

            }
        }

        try {
            Thesis::create([
                'creatorName' => $creatorName,
                'titleThesis' => $titleThesis,
                'category_id' => $category_id,
                'guideMasterUserId' => $guideMasterUserId,
                'consultantMasterUserId' => $consultantMasterUserId,
                'dateOfRegister' => $resR,
                'DefenseDate' => $resD,
            ]);
            $this->rowCountSuccess++;

        }catch (\Exception $exception){
            Log::error("Error for Create thesis because :-- ".$exception->getMessage());
            $this->rowCountFail++;
        }

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

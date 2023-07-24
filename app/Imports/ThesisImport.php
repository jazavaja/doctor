<?php

namespace App\Imports;

use App\Models\thesis;
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
        $creatorName=$row[0];
        $titleThesis=$row[1];
        $category_id=$row[2];
        $guideMasterUserId=$row[3];
        $consultantMasterUserId=$row[4];
        $dateOfRegister=$row[5];
        $defenseDate=$row[6];

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
            thesis::create([
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

    /**
     * @return int
     */
    public function getRowCountFail(): int
    {
        return $this->rowCountFail;
    }
}

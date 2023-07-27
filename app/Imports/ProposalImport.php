<?php

namespace App\Imports;

use App\Models\Proposal;
use App\Models\Thesis;
use App\Providers\GeneralMethod;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Morilog\Jalali\Jalalian;

class ProposalImport implements ToModel
{
    /**
     * @param \Maatwebsite\Excel\Row $row
     */

    private $rowCountSuccess = 0; // Initialize the row count property
    private $rowCountFail = 0; // Initialize the row count property

    public function model(array $row)
    {
        $tracking_code=$row[0] ;
        $proposal_code=$row[1] ?? '';
        $system_id=$row[2];
        $title_proposal=$row[3];
        $position_id=$row[4];
        $researcher=$row[5];
        $summary_result=$row[6];
        $result=$row[6];
        $date_register=$row[6];

        $res_date_register = null;

        if ($date_register !== null) {
            try {
                $res_date_register = Jalalian::fromFormat('Y/m/d', GeneralMethod::forNumbers($date_register))->toCarbon();
            } catch (\Exception $exception) {

            }
        }

        try {
            Proposal::create([
                'tracking_code' => $tracking_code,
                'proposal_code' => $proposal_code,
                'system_id' => $system_id,
                'title_proposal' => $title_proposal,
                'position_id' => $position_id,
                'researcher' => $researcher,
                'summary_result' => $summary_result,
                'result' => $result,
                'date_register' => $res_date_register,
            ]);
            $this->rowCountSuccess++;

        }catch (\Exception $exception){
            Log::error("Error for Create Proposal because :-- ".$exception->getMessage());
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

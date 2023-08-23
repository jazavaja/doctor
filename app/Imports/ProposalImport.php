<?php

namespace App\Imports;

use App\Jobs\CreateProposalJob;
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
        Log::info("ProposalImport log in toModel");

        [$tracking_code,$proposal_code,$system_id,$title_proposal,$position_id,$researcher,$summary_result,$result,$date_register]=$row;

        $rowData=[$tracking_code,$proposal_code,$system_id,$title_proposal,$position_id,$researcher,$summary_result,$result,$date_register];

        CreateProposalJob::dispatch($rowData);



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

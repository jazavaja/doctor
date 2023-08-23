<?php

namespace App\Jobs;

use App\Models\Proposal;
use App\Providers\GeneralMethod;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Morilog\Jalali\Jalalian;

class CreateProposalJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rowData;

    public function __construct(array $rowData)
    {
        $this->rowData = $rowData;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        [$tracking_code,$proposal_code,$system_id,$title_proposal,$position_id,$researcher,$summary_result,$result,$date_register]=$this->rowData;

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

        }catch (\Exception $exception){
            Log::error("Error for Create Proposal because :-- ".$exception->getMessage());
        }
    }
}

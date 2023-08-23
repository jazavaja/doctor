<?php

namespace App\Jobs;

use App\Models\Plan;
use App\Providers\GeneralMethod;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Morilog\Jalali\Jalalian;

class CreatePlanJob implements ShouldQueue
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
        [$title_plan, $name_project_manager, $time_project, $date_start, $date_end, $amount_contract, $date_contract, $executive_obligations_summary, $names_colleagues, $description] = $this->rowData;

        $res_date_start = $this->convertToCarbon($date_start);
        $res_date_end = $this->convertToCarbon($date_end);
        $res_date_contract = $this->convertToCarbon($date_contract);

        try {
            Plan::create([
                'title_plan' => $title_plan,
                'name_project_manager' => $name_project_manager,
                'time_project' => $time_project,
                'date_start' => $res_date_start,
                'date_end' => $res_date_end,
                'amount_contract' => $amount_contract,
                'date_contract' => $res_date_contract,
                'executive_obligations_summary' => $executive_obligations_summary,
                'names_colleagues' => $names_colleagues,
                'description' => $description,
            ]);
        } catch (\Exception $exception) {
            Log::error("Error for Create Plan because: " . $exception->getMessage());
        }
    }
    private function convertToCarbon($date)
    {
        if ($date !== null) {
            try {
                return Jalalian::fromFormat('Y/m/d', GeneralMethod::forNumbers($date))->toCarbon();
            } catch (\Exception $exception) {
                // Handle the exception if needed.
            }
        }

        return null;
    }
}

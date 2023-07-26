<?php

namespace App\Imports;

use App\Models\Plan;
use App\Providers\GeneralMethod;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Morilog\Jalali\Jalalian;

use Maatwebsite\Excel\Row;

class PlanImport implements ToModel
{
    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$title_plan, $name_project_manager, $time_project, $date_start, $date_end, $amount_contract, $date_contract, $executive_obligations_summary, $names_colleagues, $description] = $row;

        $res_date_start = $this->convertToCarbon($date_start);
        $res_date_end = $this->convertToCarbon($date_end);
        $res_date_contract = $this->convertToCarbon($date_contract);

        try {
            Plan::create([
                'title_plan' => $title_plan,
                'name_project_manager' => $name_project_manager,
                'time_project' => $time_project,
                'res_date_start' => $res_date_start,
                'res_date_end' => $res_date_end,
                'amount_contract' => $amount_contract,
                'res_date_contract' => $res_date_contract,
                'executive_obligations_summary' => $executive_obligations_summary,
                'names_colleagues' => $names_colleagues,
                'description' => $description,
            ]);
            $this->rowCountSuccess++;
        } catch (\Exception $exception) {
            Log::error("Error for Create Plan because: " . $exception->getMessage());
            $this->rowCountFail++;
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

    public function getRowCountSuccess(): int
    {
        return $this->rowCountSuccess;
    }

    public function getRowCountFail(): int
    {
        return $this->rowCountFail;
    }
}


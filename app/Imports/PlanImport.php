<?php

namespace App\Imports;

use App\Jobs\CreatePlanJob;
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

    public function model(array $row)
    {
        Log::info("PlanImport log in toModel");

        [$title_plan, $name_project_manager, $time_project, $date_start, $date_end, $amount_contract, $date_contract, $executive_obligations_summary, $names_colleagues, $description] = $row;

        $rowData=[$title_plan, $name_project_manager, $time_project, $date_start, $date_end, $amount_contract, $date_contract, $executive_obligations_summary, $names_colleagues, $description];

        CreatePlanJob::dispatch($rowData);

    }
}


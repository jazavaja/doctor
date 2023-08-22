<?php

namespace App\Jobs;

use App\Models\Thesis;
use App\Providers\GeneralMethod;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;
use Morilog\Jalali\Jalalian;

class CreateThesisJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $rowData;

    public function __construct(array $rowData)
    {
        $this->rowData = $rowData;
    }

    public function handle()
    {
        [$creatorName, $titleThesis, $category_id, $guideMasterUserId, $consultantMasterUserId, $dateOfRegister, $defenseDate] = $this->rowData;

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
        } catch (\Exception $exception) {
            Log::error("Error for Create thesis because :-- " . $exception->getMessage());
        }
    }
}

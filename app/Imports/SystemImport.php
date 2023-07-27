<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\System;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class SystemImport implements ToModel
{
    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$id,$name] = $row;

        try {
            System::create([
                'id'=>$id,
                'name' => $name,
            ]);
            $this->rowCountSuccess++;
        } catch (\Exception $exception) {
            Log::error("Error for Create System because: " . $exception->getMessage());
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

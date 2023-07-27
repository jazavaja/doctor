<?php

namespace App\Imports;

use App\Models\Category;
use App\Models\Position;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class PositionImport implements ToModel
{
    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$id,$name] = $row;

        try {
            Position::create([
                'id'=>$id,
                'name' => $name,
            ]);
            $this->rowCountSuccess++;
        } catch (\Exception $exception) {
            Log::error("Error for Create Position because: " . $exception->getMessage());
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

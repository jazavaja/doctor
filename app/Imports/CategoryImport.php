<?php

namespace App\Imports;

use App\Models\Category;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;

class CategoryImport implements ToModel
{
    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$id,$title,$name] = $row;

        try {
            Category::create([
                'id'=>$id,
                'title' => $title,
                'name' => $name,
            ]);
            $this->rowCountSuccess++;
        } catch (\Exception $exception) {
            Log::error("Error for Create Category because: " . $exception->getMessage());
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

<?php

namespace App\Imports;

use App\Jobs\CreateUserJob;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{

    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$id,$name] = $row;

        $userData = [$id, $name]; // Replace with the actual user data
        CreateUserJob::dispatch($userData);
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

<?php

namespace App\Imports;

use App\Models\Position;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Maatwebsite\Excel\Concerns\ToModel;

class UsersImport implements ToModel
{

    private $rowCountSuccess = 0;
    private $rowCountFail = 0;

    public function model(array $row)
    {
        [$id,$name] = $row;

        try {
            User::create([
                'id'     => $id,
                'name'     => $name,
                'email'    => $this->randEmail(),
                'password' => Hash::make(123123123),
                'role' => '1',
            ]);
            $this->rowCountSuccess++;
        } catch (\Exception $exception) {
            Log::error("Error for Create Position because: " . $exception->getMessage());
            $this->rowCountFail++;
        }
    }

    public function randEmail(){
        return rand(0,100000)."OPA".rand(0,10000)."@example".rand(0,10000).".com";
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

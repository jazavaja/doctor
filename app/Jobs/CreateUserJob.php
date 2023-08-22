<?php

namespace App\Jobs;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class CreateUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle()
    {
        [$id, $name] = $this->data;

        try {
            User::create([
                'id'       => $id,
                'name'     => $name,
                'email'    => $this->randEmail(),
                'password' => Hash::make(123123123),
                'role'     => '1',
            ]);
        } catch (\Exception $exception) {
            Log::error("Error for Create Position because: " . $exception->getMessage());
        }
    }

    public function randEmail(){
        return rand(0,100000)."OPA".rand(0,10000)."@example".rand(0,10000).".com";
    }
}

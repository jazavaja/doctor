<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proposal extends Model
{
    protected $fillable = [
        'tracking_code',
        'proposal_code',
        'system_id',
        'title_proposal',
        'position_id',
        'researcher',
        'summary_result',
        'date_register',
    ];

    // Define any relationships or custom methods related to the 'proposals' table here.

    public function system()
    {
        return $this->belongsTo(System::class, 'system_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class, 'position_id');
    }
}

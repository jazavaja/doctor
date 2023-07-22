<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Thesis extends Model
{
    protected $fillable = [
        'creatorName',
        'titleThesis',
        'guideMasterUserId',
        'consultantMasterUserId',
        'category_id',
        'dateOfRegister',
        'DefenseDate',
        'type',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function guideMasterUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function consultantMasterUser(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}

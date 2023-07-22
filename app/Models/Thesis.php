<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Thesis extends Model
{
    protected $fillable = [
        'creatorName',
        'titleThesis',
        'guideMasterUserId',
        'category_id',
        'dateOfRegister',
        'DefenseDate',
        'type',
    ];
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function guideMasterUser()
    {
        return $this->belongsTo(User::class);
    }
}

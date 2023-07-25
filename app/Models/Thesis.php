<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\Thesis
 *
 * @property-read \App\Models\Category|null $category
 * @property-read \App\Models\User|null $consultantMasterUser
 * @property-read \App\Models\User|null $guideMasterUser
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis query()
 * @mixin \Eloquent
 */
class Thesis extends Model
{
    protected $table= 'thesis' ;

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

    public function guideMasterUser()
    {
        return $this->belongsTo(User::class, 'guideMasterUserId');
    }

    public function consultantMasterUser()
    {
        return $this->belongsTo(User::class, 'consultantMasterUserId');
    }
}

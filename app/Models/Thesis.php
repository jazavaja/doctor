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
 * @property int $id
 * @property string $creatorName
 * @property string $titleThesis
 * @property int|null $guideMasterUserId
 * @property int|null $consultantMasterUserId
 * @property int|null $category_id
 * @property string|null $dateOfRegister
 * @property string|null $DefenseDate
 * @property string|null $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereConsultantMasterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereCreatorName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereDateOfRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereDefenseDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereGuideMasterUserId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereTitleThesis($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Thesis whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Thesis extends Model
{
    protected $table= 'thesis' ;

    protected $fillable = [
        'id','creatorName',
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

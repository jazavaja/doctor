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
        'category_id', 'creatorName', 'titleThesis', 'guideMasterUserId',
        'consultantMasterUserId', 'dateOfRegister', 'DefenseDate', 'type', 'created_at', 'updated_at'];

    protected $keyType = 'integer';


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'guideMasterUserId');
    }


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}

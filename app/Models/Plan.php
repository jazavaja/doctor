<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Plan
 *
 * @property integer $id
 * @property string $title_plan
 * @property string $name_project_manager
 * @property string $time_project
 * @property string $date_start
 * @property string $date_end
 * @property float $amount_contract
 * @property string $date_contract
 * @property string $executive_obligations_summary
 * @property string $names_colleagues
 * @property string $description
 * @property string $created_at
 * @property string $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereAmountContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDateContract($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDateEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDateStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereExecutiveObligationsSummary($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereNameProjectManager($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereNamesColleagues($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereTimeProject($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereTitlePlan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Plan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Plan extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'plan';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title_plan', 'name_project_manager', 'time_project', 'date_start', 'date_end', 'amount_contract', 'date_contract', 'executive_obligations_summary', 'names_colleagues', 'description', 'created_at', 'updated_at'];
}

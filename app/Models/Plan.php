<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
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

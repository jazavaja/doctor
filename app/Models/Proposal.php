<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * @property integer $id
 * @property integer $system_id
 * @property integer $position_id
 * @property string $tracking_code
 * @property string $proposal_code
 * @property string $title_proposal
 * @property string $researcher
 * @property string $summary_result
 * @property string $result
 * @property string $date_register
 * @property string $created_at
 * @property string $updated_at
 * @property Position $position
 * @property System $system
 */
class Proposal extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'proposal';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['system_id', 'position_id', 'tracking_code', 'proposal_code',
        'title_proposal', 'researcher', 'summary_result','result', 'date_register', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function position()
    {
        return $this->belongsTo('App\Models\Position');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function system()
    {
        return $this->belongsTo('App\Models\System');
    }
}

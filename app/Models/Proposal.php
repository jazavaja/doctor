<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * App\Models\Proposal
 *
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
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal query()
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereDateRegister($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal wherePositionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereProposalCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereResearcher($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereSummaryResult($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereSystemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereTitleProposal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereTrackingCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Proposal whereUpdatedAt($value)
 * @mixin \Eloquent
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
    protected $fillable = ['id','system_id', 'position_id', 'tracking_code', 'proposal_code',
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

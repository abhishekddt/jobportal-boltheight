<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Backend\CondidateDetail;
use App\Models\Backend\Country;


class CandidateJobPosition extends Model
{
    use HasFactory;

    protected $fillable = [
        'candidate_user_id',
        'preferred_location',
        'date_of_last_flight',
        'latest_fleet',
        'latest_rank',
        'certificate_no',
        'country_of_licence',
        'licence_no',
        'total_hours_on_fleet',
        'valid_medical',
        'non_flying_position',
        'latest_current_company',
        'cabin_crew_height',
        'cabin_crew_weight',
        'engineer_latest_airframe',
        'engineer_current_engine_type',
        'dispatcher_last_flight',
        'dispatcher_approval',
        'dispatcher_approval_authority',
    ];

    public function candidateDetail()
    {
        return $this->belongsTo(CondidateDetail::class, 'candidate_user_id', 'id');
    }


    // public function candidateDetail()
    // {
    //     return $this->belongsTo(CondidateDetail::class, 'candidate_user_id', 'id');
    // }


    public function country()
    {
        return $this->belongsTo(Country::class, 'country_of_licence');
    }

}
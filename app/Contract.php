<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'contract';

    protected $fillable = [
        'clinic_id',
        'iar',
        'whereas',
        'cfg',
        'whereas_cfg',
        'capacity',
        'duties',
        'pursuant_agreement',
        'leads',
        'cfg_location',
        'in_which',
        'licenses',
        'registrations_required',
        'supervision',
        'management_of_cfg',
        'locations_of',
        'cfg_will_charge',
        'application_fee',
        'payable_to',
        'payable_to_relating',
        'services_for_which',
        'finance_for',
        'and_advice',
        'to_engage',
        'condition_thereto',
        'direction_of_cfg',
        'signature_date',
        'iar_name',
        'signature',
        'date',
    ];
}

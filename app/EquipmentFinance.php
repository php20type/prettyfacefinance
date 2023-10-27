<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EquipmentFinance extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'equipment_finance';

    protected $fillable = [
        'name',
        'email',
        'phone',
        'contact_address_line_1',
        'contact_address_line_2',
        'contact_city',
        'contact_zip_code',
        'home_owner',
        'dob',
        'existing_lending',
        'company',
        'website',
        'address_line_1',
        'address_line_2',
        'city',
        'zip_code',
        'reg_address_line_1',
        'reg_address_line_2',
        'reg_city',
        'reg_zip_code',
        'trade_style',
        'company_reg_number',
        'business_established_date',
        'annual_turnover',
        'gross_profit',
        'net_profit',
        'any_other_directors',
        'credit_search',
        'needs_identified',
        'purchasing_from',
        'cost_of_equipment',
        'return_on_investment',
        'other_info',
        'signature',
        'Untitled',
        'previous_year',
        'bank_statement',
        'term_required',
    ];
}

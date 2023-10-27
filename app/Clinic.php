<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Message;
use App\Mail\ContactClinic;
use Illuminate\Support\Facades\Mail;

class Clinic extends Model
{
    /**
     * @var array
     */
    protected $fillable = [
        'name',
        'description',
        'address1',
        'address2',
        'city',
        'postcode',
        'website',
        'email',
        'telephone',
        'approved',
        'company_number',
        'profession',
        'pin',
        'prescriber_name',
        'prescriber_email',
        'prescriber_pin',
        'paylater_id',
        'logo',
        'paid',
        'account_number',
        'sort_code',
        'lat',
        'lng',
        'url',
        'merchant_ref',
        'is_reviewed_information'
    ];

    # Override the default create method
    public static function create(array $attributes = [])
    {
        $model = static::query()->create($attributes);

        $user = $model->users()->create([
            "name" => $attributes['user_name'],
            "email" => $attributes['user_email'],
            "password" => bcrypt($attributes['password']),
            "clinic_id" => $model->id,
            "telephone" => $attributes['user_telephone']
        ]);

        // Alert master user
        $message = Message::create([
            'text' => "A new clinic has registered! <strong>" . $model->name . "</strong>",
            'user_id' => 0
        ]);

        //Mail::to($attributes['user_email'])->send(new ContactClinic());

        return $model;
    }
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     *
     * Add relationship to users
     */
    public function users()
    {
        return $this->hasOne('App\User');
    }

    public function services()
    {
        return $this->hasMany('App\Service');
    }

    public function qualifications()
    {
        return $this->hasMany('App\Qualification');
    }

    public function documents()
    {
        return $this->hasMany('App\Document');
    }

    public function orders()
    {
        return $this->hasMany('App\Order', 'clinic_id');
    }

    public function notifications()
    {
        return $this->hasMany('App\Message', 'user_id', 'id');
    }
}

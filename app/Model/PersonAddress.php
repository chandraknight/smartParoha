<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonAddress extends Model
{
    protected $table = 'people_address';
    protected $fillable=[
        'person_id',
        'country',
        'state',
        'district',
        'muncipality',
        'ward',
        'village',
        'tole',
        'house',
        'address_type'
    ];

    public function person(){
        return $this -> belongsTo('App\Model\Person');
    }
}

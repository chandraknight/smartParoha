<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PersonId extends Model
{
    protected $table = 'people_id';
    protected $fillable=[
        'person_id','id_no','id_type'
    ];

    public function person(){
        return $this -> belongsTo('App\Model\Person','person_id');
    }
}

<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classrooms extends Model
{
    protected $fillable = [
        'title','photo'
    ];
protected $table ='classroom';

public function students()

    {
        return $this->hasMany('App\Students','classroom_id','id');
    }

}

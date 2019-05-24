<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Students extends Authenticatable
{
	use SoftDeletes;
    protected $fillable = [
        'name','email','password','classroom_id'
    ];
protected $table ='student';

public function classroom(){        
    	return $this->hasOne('App\Classrooms', 'id', 'classroom_id');    
	}
}

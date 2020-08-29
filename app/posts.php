<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class posts extends Model
{
	use SoftDeletes;
	
	protected $guarded =[];

    public function category(){
    	return $this->belongsTo('App\Category');
    }

    public function tags(){
    	return $this->belongsToMany('App\Tags');
    }

    public function users(){
    	return $this->belongsTo('App\User'); //klo tanpa s harus di tulis ('App\User', 'user_id','id')
    }
}

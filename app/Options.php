<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
	public function project(){
		return $this->belongsTo('App\Projects','project_id');
	}
	public function donates(){
		return $this->hasMany('App\Donates','option_id');
	}
}

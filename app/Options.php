<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Options extends Model
{
	public function project(){
		return $this->belongsTo('App\Projects','project_id');
	}
}

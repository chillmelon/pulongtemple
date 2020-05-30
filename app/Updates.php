<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Updates extends Model
{
	protected $table = 'updates';
    protected $fillable = [
     'title',
     'content',
    ];
	public function project(){
		return $this->belongsTo('App\Projects','project_id');
	}
}

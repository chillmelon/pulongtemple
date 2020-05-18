<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
	public function donates(){
		return $this->hasMany('App\Donates','project_id');
	}
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
    protected $fillable = [
     'title',
     'content',
    ];
    public $table = 'Projects'; 
}

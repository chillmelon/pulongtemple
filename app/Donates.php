<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donates extends Model
{
    protected $fillable = [
     'id',
     'project_id',
     'user_id',
     'amount',
     'comment',
     'uuid',
    ];
    protected $table = 'Donates'; 
    public function format(){
    	return [
    		'id'=>$this->id,
    		'project_id'=>$this->project_id,
    		'user_id'=>$this->user_id,
    		'amount'=>$this->amount,
    		'comment'=>$this->comment,
    		'uuid'=>$this->uuid
    	];
    }
    public function project(){
        return $this->belongsTo('App\Projects','project_id');
    }
}

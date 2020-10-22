<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donates extends Model
{
    protected $fillable = [
     'id',
     'project_id',
		 'option_id',
     'user_id',
		 'name',
		 'email',
     'amount',
     'comment',
		 'answer',
		 'address',
     'uuid',
    ];
    protected $table = 'Donates';
    public function project(){
        return $this->belongsTo('App\Projects','project_id');
    }
    public function option(){
        return $this->belongsTo('App\Options','option_id');
    }
    public function user(){
        return $this->belongsTo('App\User','user_id');
    }
}

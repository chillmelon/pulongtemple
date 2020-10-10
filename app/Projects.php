<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
class Projects extends Model
{
	protected $table = 'Projects';
    protected $fillable = [
     'title',
     'content',
    ];
    public function donates(){
		return $this->hasMany('App\Donates','project_id');
	}
	public function user(){
		return $this->belongsTo('App\User','user_id');
	}
    public function updates(){
		return $this->hasMany('App\Updates','project_id');
	}
    public function faqs(){
		return $this->hasMany('App\Faqs','project_id');
	}
    public function options(){
		return $this->hasMany('App\Options','project_id');
	}
}

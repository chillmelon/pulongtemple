<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donates extends Model
{
    protected $fillable = [
     'project_id',
     'user_id',
     // 'name',
     // 'email',
     'amount',
     'comment',
    ];
    public $table = 'donates'; 
}

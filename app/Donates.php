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
    public $table = 'Donates'; 
}

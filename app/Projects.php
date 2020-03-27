<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $fillable = [
     'title',
     'content',
     'created_at',
     'update_at'
    ];
}

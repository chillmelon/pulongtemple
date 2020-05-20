<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UpdateController extends Controller
{
    public function show($id)
    {
    	return view('updates.view');
    }
}

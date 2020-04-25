<?php

namespace App\Http\Controllers;

use App\Donates;
use App\Projects;
use App\User;
use Illuminate\Http\Request;

class DonatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $data['project_info'] = Projects::where('id',$id)->first();
        if (is_null(auth()->user())) {
            return view('auth.login');
        }
        $data['user_info'] = auth()->user();
        return view('donates.donate', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            '_token',
            'project_id',
            'name' => 'required',
            'amount' => 'required',
            'email' => 'required',
            'comment',
        ]);
   
        Donates::create($request->all());
        return redirect('thankyou');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Donates  $donates
     * @return \Illuminate\Http\Response
     */
    public function show($user_id)
    {
        $donations = Donates::where('user_id',$user_id);

    }

}

<?php

namespace App\Http\Controllers;

use App\Projects;
use App\Donates;
class ProjectsController
{
    // 首頁畫面
    public function index()
    {
        $projects = Projects::all();
        return view('projects.index', compact('projects'));
    }
    // 專案頁面
    public function show($id)
    {
        $project_info = Projects::where('id',$id)->first();
        // count project progress & supporters number
        $project_info['progress'] = round($project_info->total_amount/$project_info->goal*100);
        $project_info['supporter'] = Donates::where('project_id',$id)->count('user_id');
        // mysql資料叫出來轉成unix_timestamps
        $deadline = strtotime( $project_info->deadline );
        // 計算差再轉成日數
        $project_info['time_left']=date('d',$deadline - time());
        return view('projects.view', $project_info);
    }
}

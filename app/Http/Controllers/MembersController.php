<?php
namespace App\Http\Controllers;
use App\Services\MemberService;

class MembersController extends Controller
{
	public function __construct(
        MemberService $memberService
    ){
    	$this->middleware('auth');
        $this->memberService = $memberService;
    }
    public function mydonates(){
    	$user_id = auth()->user()['id'];
    	$donates = $this->memberService->donates($user_id);
    	return $donates;
    }
    public function myprojects(){
    	$user_id = auth()->user()['id'];
    	$projects = $this->memberService->projects($user_id);
    	return $projects;
    }

}
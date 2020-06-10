<?php
namespace App\Http\Controllers;
use App\Services\MemberService;
use App\Services\ProjectService;
use App\Services\DonateService;
use Illuminate\Http\Request;

class MembersController extends Controller
{
	public function __construct(
        MemberService $memberService,
        ProjectService $projectService,
        DonateService $donateService
    ){
    	$this->middleware('auth');
        $this->memberService = $memberService;
        $this->projectService = $projectService;
        $this->donateService = $donateService;
    }
    public function index(){
        $profile = $this->memberService->profile();
        return view('member.dashboard',['profile'=>$profile]);
    }
    public function donates(){
    	$user_id = auth()->user()['id'];
    	$donates = $this->memberService->donates($user_id);
    	return view('member.Donations',['donates'=>$donates]);
    }
    public function projects(){
    	$user_id = auth()->user()['id'];
    	$projects = $this->projectService->userProjects($user_id);
    	return view('member.Projects',['projects'=>$projects]);
    }
    public function update(Request $request){
        $profile = $this->memberService->update($request);
        return redirect('/dashboard')->with(['profile'=>$profile]);
    }
}

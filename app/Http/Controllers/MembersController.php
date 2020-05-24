<?php
namespace App\Http\Controllers;
use App\Services\MemberService;
use Illuminate\Http\Request;

class MembersController extends Controller
{
	public function __construct(
        MemberService $memberService
    ){
    	$this->middleware('auth');
        $this->memberService = $memberService;
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
    	$projects = $this->memberService->projects($user_id);
    	return view('member.Projects',['projects'=>$projects]);
    }
    public function update(Request $request){
        $profile = $this->memberService->update($request);
        return redirect('/dashboard')->with(['profile'=>$profile]);
    }
}

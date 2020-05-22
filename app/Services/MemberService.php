<?php

namespace App\Services;
use App\Repositories\DonateRepository;
use App\Repositories\ProjectRepository;
use App\Repositories\UserRepository;
use Image;
class MemberService
{
    private $user_id;

    public function __construct(
    DonateRepository $donateRepository,
    ProjectRepository $drojectRepository,
    UserRepository $userRepository
    ){
        $this->donateRepository = $donateRepository;
        $this->projectRepository = $drojectRepository;
        $this->userRepository = $userRepository;
    }
    public function donates($user_id=null){
        $donates = $this->donateRepository->findByUser($user_id)->sortByDesc('created_at');
        return $donates;
    }
    public function projects($user_id=null){
        $projects = $this->projectRepository->findByUser($user_id);
        return $projects;
    }
    public function profile($user_id=null){
        $user_id = auth()->user()->id;
        $profile = $this->userRepository->profile($user_id);
        return $profile;
    }
    
    public function update($request=null){
        $update = $this->validater($request);
        $user_id = $this->profile()->id;
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time(). '.' . $avatar->getClientOriginalExtension();
            $img = Image::make($avatar)->save( public_path('/storage/users/' . $filename));
            $update['avatar'] = '/users/' . $filename;
        };
        $this->userRepository->update($user_id, $update);
        return $this->profile();
    }
    
    public function validater($request=null){
        return $request->validate([
            'name' => 'sometimes|string|max:16',
            'avatar'  => 'sometimes|file|image|max:5000'
        ]);
    }
}

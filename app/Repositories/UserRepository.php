<?php
namespace App\Repositories;
use App\User;
class UserRepository
{
	public function profile($user_id){
		$user = User::where('id', $user_id)->first();
		return $user;
	}
	public function update($user_id, $update)
	{
		$user = User::where('id',$user_id);
		$user->update($update);
	}
}
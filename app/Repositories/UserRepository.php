<?php
namespace App\Repositories;
use App\User;
class UserRepository
{
	public function update($user_id, $update)
	{
		$user = User::where('id',$user_id);
		$user->update($update);
	}
}
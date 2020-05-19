<?php
namespace App\Repositories;
use App\Donates;
class DonateRepository
{
	public function all()
	{
		return Donates::all();
	}
	public function findByUser($user_id)
	{
		$donates = Donates::where('user_id', $user_id)
								->with('project')
								->get();
		return $donates;
	}
	public function findByProject($project_id)
	{
		$donates = Donates::where('project_id',$project_id)
			->where('paid',1)
			->get();
		return $donates;
	}
	public function create($donation)
	{
		Donates::create($donation);
	}
	public function update($uuid, $update)
	{
		$donate = Donates::where('uuid',$uuid);
		$donate->update($update);
	}
}
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
								->where('paid',1)
								->with('project')
								->with('option')
								->get();
		return $donates;
	}
	public function findByProject($project_id)
	{
		$donates = Donates::where('project_id',$project_id)
			->where('paid',1)
			->with('user')
			->get();
		return $donates;
	}
	public function findByOption($option_id)
	{
		$donates = Donates::where('option_id',$option_id)
			->where('paid',1)
			->get();
		return $donates;
	}
	public function findByUuid($uuid)
	{
		$donation = Donates::where('uuid', $uuid)
								->where('uuid',$uuid)
								->firstOrFail();
		return $donation;
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

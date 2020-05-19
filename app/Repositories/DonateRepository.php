<?php
namespace App\Repositories;
use App\Donates;
class DonateRepository
{
	public function all()
	{
		return Donates::all()
			->map(function($Donate){
				return $Donate->format();
			});
	}
	public function findByUser($user_id)
	{
		$donates = Donates::where('user_id', $user_id)
			->all();
		return $donates;
	}
	public function findByProject($project_id)
	{
		$donates = Donates::where('project_id',$project_id)
			->where('paid',1)
			->get();
		return $donates;
	}
}
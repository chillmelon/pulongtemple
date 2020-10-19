<?php

namespace App\Services;
use App\Repositories\DonateRepository;
use App\Repositories\ProjectRepository;
use Illuminate\Support\Str;

class DonateService
{
	private $donateRepository;
	public function __construct(
		DonateRepository $donateRepository,
		ProjectRepository $projectRepository
	){
		$this->donateRepository = $donateRepository;
		$this->projectRepository = $projectRepository;
		// everything
	}
	public function all()
	{
		$donates = $this->donateRepository->all();
		return $donates;
	}
	// find donations made by a specific user
	public function userDonates($user_id=null)
	{
		$donates = $this->donateRepository->findByUserId($user_id);
		return $donates;
	}
	// find top 5 donates for a particular project
	public function topFive($project_id=null){
		$top = $this->donateRepository->findByProject($project_id)
																->whereNotNull('user_id')
																->groupBy('user_id')
																->map(function ($donation){
																	return [
																		'avatar' => $donation->first()->user->avatar,
																		'name' => $donation->first()->user->name,
																		'amount' => $donation->sum('amount')
																	];
																})
																->sortByDesc('amount')
																->take(5);
		return $top;
	}
	// find random 5 comments for a particular project
	public function randFive($project_id=null){
		$donates = $this->donateRepository->findByProject($project_id)->whereNotNull('comment');
		$rand = $donates
			->random(min($donates->count(),5))
			->map(function ($donation){
				if($donation->user != null){
					return [
						'avatar' => $donation->user->avatar,
						'name' => $donation->name,
						'comment' => $donation->comment
					];}
				else{
					return [
						'avatar' => 'users/default.png',
						'name' => $donation->name,
						'comment' => $donation->comment
					];
				}
			});
		return $rand;
	}
	public function gallary($project_id=null){
		$gallary = $this->donateRepository->findByProject($project_id)
																		->map(function ($donation){
																			if($donation->user != null){
																				return [
																					'avatar' => $donation->user->avatar,
																				];}
																			return [
																				'avatar' => 'users/default.png',
																			];
																		});
		return $gallary;
	}
	// create a new donation order
	public function new($donation=null)
	{
		if(empty( $donation->input('name') )){
			$donation->merge([
				'name'=>'不知名信徒'
			]);
		}
		$donation->validate([
			'_token',
			'name' => 'required|string|max:16',
			'amount' => 'required|integer|max:1000000',
			'email' => 'required|email|max:30',
			'comment' => 'nullable|string|max:255'
		]);
		// 另外驗證金額
		if($donation->option_id){
			$option = $this->projectRepository
										->getOptionById($donation->option_id);
			$donation->validate([
				'amount' => 'required|gte:'. $option->price
			]);
		}
		$donation=$this->format($donation);
		$this->donateRepository->create($donation);
		return $donation;
	}

	public function format($donation){
		$uuid = str_replace("-","",substr(Str::uuid()->toString(),0,18));
		return [
			'name' => $donation->name,
			'amount' => $donation->amount,
			'email'=>$donation->email,
			'comment'=>$donation->comment,
			'address'=>$donation->address,
			'answer'=>$donation->answer,
			'project_id'=>$donation->project_id,
			'option_id'=>$donation->option_id,
			'user_id'=>$donation->user_id,
			'uuid'=>$uuid
		];
	}
}

<?php

namespace App\Services;
use App\Repositories\UpdateRepository;

class UpdateService
{
	public function __construct(UpdateRepository $updateRepository)
	{
		$this->updateRepository = $updateRepository;
	}
	public function create($updates=null){
		$this->updateRepository->create($updates);
	}
	public function show($id=null){
		$update=$this->updateRepository->findById($id);
		return $update;
	}
}


<?php

namespace App\Services;
use App\Repositories\UpdateRepository;

class UpdateService
{
	public function __construct(UpdateRepository $updateRepository)
	{
		$this->updateRepository = $updateRepository;
	}
	public function create($updates){
		$this->updateRepository->create($updates);
	}
}


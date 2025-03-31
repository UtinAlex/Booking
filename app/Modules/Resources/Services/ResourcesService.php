<?php


namespace App\Modules\Resources\Services;

use App\Modules\Resources\Repositories\ResourcesRepository;

class ResourcesService
{
    private ResourcesRepository $resourcesRepository;

    public function __construct(ResourcesRepository $resourcesRepository)
    {
        $this->resourcesRepository = $resourcesRepository;
    }

    public function store(array $data)
    {
        return $this->resourcesRepository->store($data);
    }

}

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

    public function index()
    {
        return $this->resourcesRepository->index();
    }

    public function showBookings(int $resourcesId)
    {
        return $this->resourcesRepository->showBookings($resourcesId);
    }
}

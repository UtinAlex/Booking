<?php

namespace App\Modules\Resources\Controllers;

use App\Models\Resources;
use Illuminate\Http\Request;
use App\Modules\Resources\Requests\StoreResourcesRequest;
use App\Modules\Resources\Services\ResourcesService;
use App\Modules\Resources\Resources\ResourcesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class ResourcesController extends Controller
{
    private ResourcesService $resourcesService;

    public function __construct(ResourcesService $resourcesService)
    {
        $this->resourcesService = $resourcesService;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourcesRequest $request): ResourcesResource
    {
        return new ResourcesResource($this->resourcesService->store($request->validated()));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Resources $resources)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Resources $resources)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Resources $resources)
    {
        //
    }
}

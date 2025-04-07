<?php

namespace App\Modules\Resources\Controllers;

use App\Models\Resources;
use Illuminate\Http\Request;
use App\Modules\Resources\Requests\StoreResourcesRequest;
use App\Modules\Resources\Services\ResourcesService;
use App\Modules\Resources\Resources\ResourcesResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;
use App\Modules\Booking\Resources\BookingResource;

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
    public function index(): JsonResource
    {
        return ResourcesResource::collection($this->resourcesService->index());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreResourcesRequest $request): JsonResource
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

    /**
     * Display the specified resource.
     */
    public function showBookings(int $resourcesId)
    {
        $validator = Validator::make(['resourcesId' => $resourcesId], [
            'resourcesId' => 'required|integer|exists:resources,id',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        return BookingResource::collection($this->resourcesService->showBookings($resourcesId));
    }
}

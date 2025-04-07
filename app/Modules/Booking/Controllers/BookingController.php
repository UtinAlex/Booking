<?php

namespace App\Modules\Booking\Controllers;

use App\Modules\Booking\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Modules\Booking\Requests\StoreBookingRequest;
use App\Modules\Booking\Services\BookingService;
use App\Modules\Booking\Resources\BookingResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Validator;

class BookingController extends Controller
{
    private BookingService $bookingService;

    public function __construct(BookingService $bookingService)
    {
        $this->bookingService = $bookingService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookingRequest $request): JsonResource
    {
        return new BookingResource($this->bookingService->store($request->validated()));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $bookingId)
    {
        $validator = Validator::make(['bookingId' => $bookingId], [
            'bookingId' => 'required|integer|exists:bookings,id',
        ]);
        
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }

        Booking::findOrFail($bookingId)->delete();

        return response()->noContent();
    }
}

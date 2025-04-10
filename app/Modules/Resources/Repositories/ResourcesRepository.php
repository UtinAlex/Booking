<?php


namespace App\Modules\Resources\Repositories;

use App\Modules\Resources\Models\Resources;
use App\Modules\Booking\Models\Booking;
use Illuminate\Support\Facades\Route;

class ResourcesRepository
{
    public function store(array $data)
    {
        try {

            return Resources::create($data);

        } catch (\Exception $e) {
            \Log::error("Ошибка при создании ресурса: " . $e->getMessage());
            
            throw new \App\Exceptions\ProjectException(
                $e->getMessage(),
                500,
                Route::currentRouteName()
            );
        }
    }

    public function index()
    {
        try {

            return Resources::all();

        } catch (\Exception $e) {
            \Log::error("Ошибка при получении списка ресурсов: " . $e->getMessage());
            
            throw new \App\Exceptions\ProjectException(
                $e->getMessage(),
                500,
                Route::currentRouteName()
            );
        }
    }

    public function showBookings(int $resourcesId)
    {
        try {

            $bookings = Booking::where('resources_id', $resourcesId)->get();
            
            return $bookings;

        } catch (\Exception $e) {
            \Log::error("Ошибка при получении списка броней ресурса: " . $e->getMessage());
            
            throw new \App\Exceptions\ProjectException(
                $e->getMessage(),
                500,
                Route::currentRouteName()
            );
        }
    }
}

<?php


namespace App\Modules\Booking\Repositories;

use App\Modules\Booking\Models\Booking;
use Illuminate\Support\Facades\Route;

class BookingRepository
{
    public function store(array $data)
    {
        try {

            return Booking::create(
                [
                'user_id' => $data['userId'],
                'resources_id'  => $data['resourcesId'],
                'start_time'  => $data['startTime'],
                'end_time'  => $data['endTime'],
                ]
            );

        } catch (\Exception $e) {
            \Log::error("Ошибка при бронировании: " . $e->getMessage());
            
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
            \Log::error("Ошибка при получении списка бронирований: " . $e->getMessage());
            
            throw new \App\Exceptions\ProjectException(
                $e->getMessage(),
                500,
                Route::currentRouteName()
            );
        }
    }
}

<?php


namespace App\Modules\Booking\Services;

use App\Modules\Booking\Repositories\BookingRepository;

class BookingService
{
    private BookingRepository $bookingRepository;

    public function __construct(BookingRepository $bookingRepository)
    {
        $this->bookingRepository = $bookingRepository;
    }

    public function store(array $data)
    {
        return $this->bookingRepository->store($data);
    }

    public function index()
    {
        return $this->bookingRepository->index();
    }

}

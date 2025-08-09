<?php

namespace App\Services\Interfaces;

interface ReservationServiceInterface
{
    public function makeReservation(array $data);
    public function cancelReservation(int $id);
    public function getAvailableTimeSlots(int $stadiumId, string $date);
}

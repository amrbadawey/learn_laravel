<?php

namespace App\Services;

use App\Repositories\Interfaces\ReservationRepositoryInterface;
use App\Services\Interfaces\ReservationServiceInterface;
use App\Models\TimeSlot;
use Carbon\Carbon;

class ReservationService implements ReservationServiceInterface
{
    protected $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function makeReservation(array $data)
    {
        // Basic conflict check
        $reservations = $this->reservationRepository->findByStadiumAndDate($data['stadium_id'], $data['date']);
        foreach ($reservations as $reservation) {
            if (
                ($data['start_time'] >= $reservation->start_time && $data['start_time'] < $reservation->end_time) ||
                ($data['end_time'] > $reservation->start_time && $data['end_time'] <= $reservation->end_time)
            ) {
                throw new \Exception('Time slot is already booked.');
            }
        }

        return $this->reservationRepository->create($data);
    }

    public function cancelReservation(int $id)
    {
        $reservation = $this->reservationRepository->find($id);
        if ($reservation) {
            $reservation->status = 'cancelled';
            $reservation->save();
            return $reservation;
        }
        return null;
    }

    public function getAvailableTimeSlots(int $stadiumId, string $date)
    {
        $dayOfWeek = Carbon::parse($date)->dayOfWeek;
        $timeSlots = TimeSlot::where('stadium_id', $stadiumId)->where('day_of_week', $dayOfWeek)->get();
        $reservations = $this->reservationRepository->findByStadiumAndDate($stadiumId, $date);

        $availableSlots = [];

        foreach ($timeSlots as $timeSlot) {
            $isBooked = false;
            foreach ($reservations as $reservation) {
                if (
                    ($timeSlot->start_time >= $reservation->start_time && $timeSlot->start_time < $reservation->end_time) ||
                    ($timeSlot->end_time > $reservation->start_time && $timeSlot->end_time <= $reservation->end_time)
                ) {
                    $isBooked = true;
                    break;
                }
            }

            if (!$isBooked) {
                $availableSlots[] = $timeSlot;
            }
        }

        return $availableSlots;
    }
}

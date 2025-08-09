<?php

namespace App\Repositories;

use App\Models\Reservation;
use App\Repositories\Interfaces\ReservationRepositoryInterface;

class ReservationRepository implements ReservationRepositoryInterface
{
    public function create(array $data)
    {
        return Reservation::create($data);
    }

    public function find(int $id)
    {
        return Reservation::find($id);
    }

    public function update(int $id, array $data)
    {
        $reservation = $this->find($id);
        if ($reservation) {
            $reservation->update($data);
            return $reservation;
        }
        return null;
    }

    public function delete(int $id)
    {
        $reservation = $this->find($id);
        if ($reservation) {
            return $reservation->delete();
        }
        return false;
    }

    public function all()
    {
        return Reservation::all();
    }

    public function paginate(int $perPage)
    {
        return Reservation::paginate($perPage);
    }

    public function findByStadiumAndDate(int $stadiumId, string $date)
    {
        return Reservation::where('stadium_id', $stadiumId)
            ->where('date', $date)
            ->get();
    }
}

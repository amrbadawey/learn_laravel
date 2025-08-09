<?php

namespace App\Repositories\Interfaces;

interface ReservationRepositoryInterface
{
    public function create(array $data);
    public function find(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
    public function all();
    public function paginate(int $perPage);
    public function findByStadiumAndDate(int $stadiumId, string $date);
}

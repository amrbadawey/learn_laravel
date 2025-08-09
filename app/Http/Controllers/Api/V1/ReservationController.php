<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReservationRequest;
use App\Http\Resources\ReservationResource;
use App\Models\Reservation;
use App\Models\Stadium;
use App\Services\Interfaces\ReservationServiceInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationService;

    public function __construct(ReservationServiceInterface $reservationService)
    {
        $this->reservationService = $reservationService;
    }

    public function index()
    {
        return ReservationResource::collection(Reservation::with(['user', 'stadium'])->paginate(10));
    }

    public function store(StoreReservationRequest $request)
    {
        $data = $request->validated();
        $data['user_id'] = $request->user()->id;

        try {
            $reservation = $this->reservationService->makeReservation($data);
            return new ReservationResource($reservation);
        } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 409);
        }
    }

    public function show(Reservation $reservation)
    {
        return new ReservationResource($reservation->load(['user', 'stadium']));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return response()->noContent();
    }

    public function cancel(Reservation $reservation)
    {
        $this->reservationService->cancelReservation($reservation->id);
        return new ReservationResource($reservation->fresh());
    }

    public function checkAvailability(Request $request, Stadium $stadium)
    {
        $request->validate(['date' => 'required|date']);
        $availableSlots = $this->reservationService->getAvailableTimeSlots($stadium->id, $request->date);
        return response()->json($availableSlots);
    }
}

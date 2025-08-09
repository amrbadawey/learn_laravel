<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index()
    {
        $reservations = Reservation::with(['user', 'stadium'])->paginate(10);
        return view('admin.reservations.index', compact('reservations'));
    }

    public function show(Reservation $reservation)
    {
        return view('admin.reservations.show', compact('reservation'));
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return redirect()->route('admin.reservations.index')->with('success', 'Reservation deleted successfully.');
    }
}

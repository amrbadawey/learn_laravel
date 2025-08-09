<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Stadium;
use App\Models\Club;
use App\Models\SportType;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        $stadiums = Stadium::with(['club', 'sportType'])->paginate(10);
        return view('admin.stadiums.index', compact('stadiums'));
    }

    public function create()
    {
        $clubs = Club::all();
        $sportTypes = SportType::all();
        return view('admin.stadiums.create', compact('clubs', 'sportTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'club_id' => 'required|exists:clubs,id',
            'sport_type_id' => 'required|exists:sport_types,id',
        ]);

        Stadium::create($request->all());

        return redirect()->route('admin.stadiums.index')->with('success', 'Stadium created successfully.');
    }

    public function show(Stadium $stadium)
    {
        return view('admin.stadiums.show', compact('stadium'));
    }

    public function edit(Stadium $stadium)
    {
        $clubs = Club::all();
        $sportTypes = SportType::all();
        return view('admin.stadiums.edit', compact('stadium', 'clubs', 'sportTypes'));
    }

    public function update(Request $request, Stadium $stadium)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'club_id' => 'required|exists:clubs,id',
            'sport_type_id' => 'required|exists:sport_types,id',
        ]);

        $stadium->update($request->all());

        return redirect()->route('admin.stadiums.index')->with('success', 'Stadium updated successfully.');
    }

    public function destroy(Stadium $stadium)
    {
        $stadium->delete();
        return redirect()->route('admin.stadiums.index')->with('success', 'Stadium deleted successfully.');
    }
}

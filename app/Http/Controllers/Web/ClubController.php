<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Club;
use App\Models\User;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        $clubs = Club::with('user')->paginate(10);
        return view('admin.clubs.index', compact('clubs'));
    }

    public function create()
    {
        $users = User::all();
        return view('admin.clubs.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        Club::create($request->all());

        return redirect()->route('admin.clubs.index')->with('success', 'Club created successfully.');
    }

    public function show(Club $club)
    {
        return view('admin.clubs.show', compact('club'));
    }

    public function edit(Club $club)
    {
        $users = User::all();
        return view('admin.clubs.edit', compact('club', 'users'));
    }

    public function update(Request $request, Club $club)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'user_id' => 'required|exists:users,id',
        ]);

        $club->update($request->all());

        return redirect()->route('admin.clubs.index')->with('success', 'Club updated successfully.');
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return redirect()->route('admin.clubs.index')->with('success', 'Club deleted successfully.');
    }
}

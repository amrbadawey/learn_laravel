<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreClubRequest;
use App\Http\Requests\UpdateClubRequest;
use App\Http\Resources\ClubResource;
use App\Models\Club;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function index()
    {
        return ClubResource::collection(Club::with(['user', 'stadiums'])->paginate(10));
    }

    public function store(StoreClubRequest $request)
    {
        $club = Club::create($request->validated());
        return new ClubResource($club);
    }

    public function show(Club $club)
    {
        return new ClubResource($club->load(['user', 'stadiums']));
    }

    public function update(UpdateClubRequest $request, Club $club)
    {
        $club->update($request->validated());
        return new ClubResource($club);
    }

    public function destroy(Club $club)
    {
        $club->delete();
        return response()->noContent();
    }
}

<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreStadiumRequest;
use App\Http\Requests\UpdateStadiumRequest;
use App\Http\Resources\StadiumResource;
use App\Models\SportType;
use App\Models\Stadium;
use Illuminate\Http\Request;

class StadiumController extends Controller
{
    public function index()
    {
        return StadiumResource::collection(Stadium::with(['club', 'sportType'])->paginate(10));
    }

    public function store(StoreStadiumRequest $request)
    {
        $stadium = Stadium::create($request->validated());
        return new StadiumResource($stadium);
    }

    public function show(Stadium $stadium)
    {
        return new StadiumResource($stadium->load(['club', 'sportType']));
    }

    public function update(UpdateStadiumRequest $request, Stadium $stadium)
    {
        $stadium->update($request->validated());
        return new StadiumResource($stadium);
    }

    public function destroy(Stadium $stadium)
    {
        $stadium->delete();
        return response()->noContent();
    }

    public function indexBySportType(SportType $sportType)
    {
        return StadiumResource::collection($sportType->stadiums()->with('club')->paginate(10));
    }
}

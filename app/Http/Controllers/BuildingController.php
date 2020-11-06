<?php

namespace App\Http\Controllers;

use App\Models\Building;
use App\Http\Resources\BuildingResource;
use App\Http\Resources\FirmResource;
use Illuminate\Http\Request;

class BuildingController extends Controller

{
    /**
     * Display all firms that locates in exact building
     * @param Building $building
     * @return App\Http\Resources\FirmResource;
     */
    public function displayFirmbyId(Building $building)
    {
        return FirmResource::collection($building->firms->load('categories'));
    }
    /**
     * Display a listing of the resource.
     *
     * @return App\Http\Resources\BuildingResource;
     */
    public function index()
    {
        $buildings = Building::all();

        return BuildingResource::collection($buildings);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return App\Http\Resources\BuildingResource;
     */
    public function store(Request $request)
    {
        $building = Building::create($request->all());

        return new BuildingResource($building);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return App\Http\Resources\BuildingResource;
     */
    public function show(Building $building)
    {
        return new BuildingResource($building->load('firms'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return App\Http\Resources\BuildingResource;
     */
    public function update(Request $request, Building $building)
    {
        $building->update($request->only('address', 'geoposition'));

        return new BuildingResource($building);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy(Building $building)
    {
        $building->delete();

        return response('Building deleted', 204);
    }

}

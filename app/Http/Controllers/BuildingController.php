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

    public function buildingsInCircle(Request $request) {
        $latitude = $request->lat;
        $longitude = $request->lng;
        $radius = $request->radius;

        $buildings = Building::selectRaw("id, address, lat, lng,
                         ( 6371000 * acos( cos( radians(?) ) *
                           cos( radians( lat ) )
                           * cos( radians( lng ) - radians(?)
                           ) + sin( radians(?) ) *
                           sin( radians( lat ) ) )
                         ) AS distance", [$latitude, $longitude, $latitude])
            ->having("distance", "<", $radius)
            ->orderBy("distance",'asc')
            ->get();

        return BuildingResource::collection($buildings);
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
        $building->update($request->only('address', 'lat', 'lng'));

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

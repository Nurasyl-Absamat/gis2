<?php

namespace App\Http\Controllers;

use App\Firm;
use App\Http\Resources\FirmResource;
use Illuminate\Http\Request;

class FirmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $firms = Firm::with('phones', 'categories', 'building')->get();

        return FirmResource::collection($firms);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $firm = Firm::create($request->only('title', 'building_id'));
        $firm->categories()->sync($request->category_ids);

        return new FirmResource($firm);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Firm $firm)
    {
        return new FirmResource($firm);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Firm $firm)
    {
        $firm->update($request->only('title', 'building_id'));
        $firm->sync($request->category_ids);

        return new FirmResource($firm);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Firm $firm)
    {
        $firm->delete();

        return response('Firm deleted', 204);
    }
}

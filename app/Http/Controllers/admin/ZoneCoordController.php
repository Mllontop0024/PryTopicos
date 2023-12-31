<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Zone;
use App\Models\admin\ZoneCoord;
use Illuminate\Http\Request;

class ZoneCoordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        ZoneCoord::create($request->all());
        return redirect()->route('admin.zones.show', $request->zone_id)->with('success', 'Coordenada agregada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zone = Zone::find($id);

        $vertice = ZoneCoord::select('latitude as lat', 'longitude as lng')
            ->where('zone_id', $id)->get();

        $lastCoord = ZoneCoord::select('latitude as lat', 'longitude as lng')
            ->where('zone_id', $id)->latest()->first();

        return view('admin.zonecoords.create', compact('zone', 'vertice', 'lastCoord'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zoneCoord = ZoneCoord::find($id);
        $zoneCoord->delete();
        return redirect()->route('admin.zones.show', $zoneCoord->zone_id)->with('success', 'Coordenada eliminada');
    }
}

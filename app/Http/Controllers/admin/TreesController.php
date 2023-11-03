<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Families;
use App\Models\admin\Species;
use App\Models\admin\Tree;
use App\Models\admin\Zone;
use Illuminate\Http\Request;

class TreesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trees = Tree::select('trees.id', 'trees.name', 'families.name as familyname', 'species.name as speciename', 'zones.name as zonename')
            ->join('families', 'families.id', '=', 'trees.family_id')
            ->join('species', 'species.id', '=', 'trees.specie_id')
            ->join('zones', 'zones.id', '=', 'trees.zone_id');

            return view('admin.trees.index', compact('trees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $zones = Zone::all()->pluck('name','id');
        $family_species = Families::whereRaw('id IN (SELECT family_id FROM species)')->get();
        $families = $family_species->pluck('name','id');
        $species = Species::where('family_id',$family_species->first()->id)->pluck('name','id');
        
        return view('admin.trees.create', compact('zones','families','species'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
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
        //
    }
}

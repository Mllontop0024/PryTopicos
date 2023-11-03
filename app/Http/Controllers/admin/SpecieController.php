<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Families;
use App\Models\admin\SpeciePhotos;
use App\Models\admin\Species;
use Illuminate\Http\Request;

class SpecieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $species = Species::all();
        return view('admin.species.index', compact('species'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
   
        $families = Families::pluck('name','id');
        return view('admin.species.create', compact('families'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Species::create($request->all());
        return Redirect()->route('admin.species.index')->with('success','Especie registrada');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $specie = Species::find($id);
        $speciephotos = SpeciePhotos::where('specie_id',$id)->get();
        
        return view('admin.species.show', compact('specie','speciephotos'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $specie = Species::find($id);
        $families = Families::pluck('name','id');
        return view('admin.species.edit', compact('specie','families'));
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
        $specie = Species::find($id);
        $specie->update($request->all());
        return Redirect()->route('admin.species.index')->with('success','Especie actualizada');
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

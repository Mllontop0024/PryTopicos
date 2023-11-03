<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Families;
use App\Models\admin\Species;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FamiliesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $families = Families::all();
        return view('admin.families.index', compact('families'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.families.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Families::create($request->all());
        return Redirect()->route('admin.families.index')->with('success', 'Familia registrada');
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
        $family = Families::find($id);
        return view('admin.families.edit', compact('family'));
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
        $family = Families::find($id);
        $family->update($request->all());
        return Redirect()->route('admin.families.index')->with('success', 'Familia actualizada');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $family = Families::find($id);
        $family->delete();
        return Redirect()->route('admin.families.index')->with('success', 'Familia eliminada');
    }

    public function species_family($id)
    {
        $species = Species::where('family_id', $id)->get();
        return $species;
    }
}

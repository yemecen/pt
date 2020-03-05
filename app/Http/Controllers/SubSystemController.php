<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubSystem;
use App\System;

class SubSystemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subsystems = SubSystem::all();

        return view('subsystem.index',compact('subsystems'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $systems = System::all();

        return view('subsystem.create',compact('systems'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Name' => 'required',
        ]);

        SubSystem::create($request->all());

        return redirect()->route('subsystems.index'); 
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
    public function edit(SubSystem $subsystem)
    {
        $systems = System::all();

        return view('subsystem.edit',compact('subsystem','systems'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubSystem $subsystem)
    {
        $request->validate([
            'Name' => 'required',
        ]);

        $subsystem->update($request->all());

        return redirect()->route('subsystems.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubSystem $subsystem)
    {
        $subsystem->delete();

        return redirect()->route('subsystems.index');
    }
}

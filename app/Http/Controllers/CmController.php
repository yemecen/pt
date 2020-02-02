<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cm;
use App\Type;
use App\System;
use App\SubSystem;
use App\Level;
use App\Precedence;

class CmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cms = Cm::all();

        return view('cm.index', compact('cms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $types = Type::all();
        $systems = System::all();
        $subSystems = SubSystem::all();
        $levels = Level::all();
        $precedences = Precedence::all();
                
        return view('cm.create',compact('types','systems','subSystems','levels','precedences'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$request->validate([
            'tip' => 'required',            
            'sistem' => 'required',            
            'altSistem' => 'required',            
            'baslik' => 'required',            
            'onemDerecesi' => 'required',            
            'oncelik' => 'required',            
            'aciklama' => 'required',                        
        ]);*/

        //dd($request->tip);
        
        //Cm::create($request->all());
        
        //return redirect()->route('cm.index')->with('success','Cm oluşturuldu');
        
        $cm = new Cm;
        $cm->Title = $request->baslik;
        $cm->UserID = 1;
        $cm->Description = $request->aciklama;
        $cm->TypeID = $request->tip;
        $cm->SystemID = $request->sistem;
        $cm->SubSystemID = $request->altSistem;
        $cm->LevelID = $request->onemDerecesi;
        $cm->PrecedenceID = $request->oncelik;
        
        $cm->save();

        return redirect()->route('cms.index');
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

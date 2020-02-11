<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cm;
use App\CmDetail;
use App\Type;
use App\System;
use App\SubSystem;
use App\Level;
use App\Precedence;
use App\User;
use App\Stat;

class CmController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $users = User::all();
    
        return view('cm.create',compact('types','systems','subSystems','levels','precedences','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $cm = new Cm;
        $cm->Title = $request->baslik;
        $cm->UserID = $request->userID;
        $cm->ResponsibleUserID = $request->sorumlu;
        $cm->Description = $request->aciklama;
        $cm->TypeID = $request->tip;
        $cm->SystemID = $request->sistem;
        $cm->SubSystemID = $request->altSistem;
        $cm->LevelID = $request->onemDerecesi;
        $cm->PrecedenceID = $request->oncelik;
        $cm->StatID = 1;
        //$cm->save();

        if ($request->hasFile('image')) {
        
            $files = $request->file('image');
        
            foreach($files as $file){
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                $destinationPath = 'img/';
                $file->move($destinationPath, $fileName);
            }
        }
        dd($files);
        
        //return redirect()->route('cms.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cm = Cm::find($id);
        
        $cmDetail = CmDetail::where('CmID',$cm->ID)->orderBy('ID', 'DESC')->get();

        $types = Type::all();
        $systems = System::all();
        $subSystems = SubSystem::all();
        $levels = Level::all();
        $precedences = Precedence::all();
        $users = User::all();
        $stats = Stat::all();
      
        return view('cm.show',compact('cm','cmDetail','types','systems','subSystems','levels','precedences','users','stats'));
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

    public function search(Request $request)
    {      
        $cms = is_numeric($request->search) ? Cm::where('ID','=',(int)$request->search)->get() : Cm::where('Title', 'like', "%".$request->search."%")->get();
        
        return view('cm.index', compact('cms'));
    }
}

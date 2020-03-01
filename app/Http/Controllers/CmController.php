<?php

namespace App\Http\Controllers;

use App\Cm;
use App\CmDetail;
use App\Type;
use App\System;
use App\SubSystem;
use App\Level;
use App\Precedence;
use App\User;
use App\Stat;
use App\Additional;
use App\CmDetailAdditional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

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
        $precedences = Precedence::all();
        $subSystems = SubSystem::all();
        $stats = Stat::all();
        $users = User::all();
        
        return view('cm.index', compact('cms','precedences','subSystems','stats','users'));
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
        $request->validate([
            'baslik' => 'required',
            'aciklama' => 'required',
        ]);

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
        $cm->Mail = $request->mail;
        $cm->StatID = 1;
        $cm->save();

        if ($request->hasFile('image')) {
        
            $files = $request->file('image');
        
            foreach($files as $file){
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                $destinationPath = 'cmFiles/';
                $file->move($destinationPath, $fileName);

                $additional = new Additional;
                $additional->CmID = $cm->id;
                $additional->FileName = $fileName;
                $additional->save();
            }
        }
        
        if(isset($cm->Mail))
        $emails = explode(",",$cm->Mail);

        array_push($emails,User::find($cm->UserID)->email);
        
        array_push($emails,User::find($cm->ResponsibleUserID)->email);
        
        $details = [
            'title' => $cm->Title,
            'description' => $cm->Description,
            'no' => $cm->id
        ];

        Mail::to(array_unique($emails))->send(new SendMail($details));
        
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
        $cm = Cm::find($id);
        
        $cmDetail = CmDetail::where('CmID',$cm->ID)->orderBy('ID', 'DESC')->get();
        $types = Type::all();
        $systems = System::all();
        $subSystems = SubSystem::all();
        $levels = Level::all();
        $precedences = Precedence::all();
        $users = User::all();
        $stats = Stat::all();
        $additionals = Additional::where('CmID',$cm->ID)->get();
        
        return view('cm.show',compact('cm','cmDetail','types','systems','subSystems','levels','precedences','users','stats','additionals','cmDetailAdditional'));
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
        
        $precedences = Precedence::all();
        $subSystems = SubSystem::all();
        $stats = Stat::all();
        $users = User::all();
        
        return view('cm.index', compact('cms','precedences','subSystems','stats','users','selectedValue'));
    }
    
    public function open()
    {      
        $cms = Cm::where('ResponsibleUserID','=',Auth::user()->id)->where('StatID','<>',2)->get();
        
        $precedences = Precedence::all();
        $subSystems = SubSystem::all();
        $stats = Stat::all();
        $users = User::all();
        
        return view('cm.index', compact('cms','precedences','subSystems','stats','users','selectedValue'));
    }
    
    public function close()
    {      
        $cms = Cm::where('ResponsibleUserID','=',Auth::user()->id)->where('StatID','=',2)->get();
        
        $precedences = Precedence::all();
        $subSystems = SubSystem::all();
        $stats = Stat::all();
        $users = User::all();
        
        return view('cm.index', compact('cms','precedences','subSystems','stats','users','selectedValue'));
    }

    public function selectSearch(Request $request)
    {      
        $selectedInputValue = $request->all();

        $selectedValue = array();

        foreach ($selectedInputValue as $key => $value) {
            if ( isset($value) && $key != '_token' )
                $selectedValue += [$key => $value] ;
        }
        
        
        $cms = Cm::where($selectedValue)->get();
        //['UserID' => '1', 'ResponsibleUserID' => '4']
        $precedences = Precedence::all();
        $subSystems = SubSystem::all();
        $stats = Stat::all();
        $users = User::all();
        
        return view('cm.index', compact('cms','precedences','subSystems','stats','users','selectedValue'));
    }
}

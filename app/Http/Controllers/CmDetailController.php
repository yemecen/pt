<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cm;
use App\User;
use App\CmDetail;
use App\CmDetailAdditional;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class CmDetailController extends Controller
{
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
        $request->validate([
            'baslik' => 'required',
            'aciklama' => 'required',
        ]);
        
        $cmDetail = new CmDetail;
        $cmDetail->CmID = $request->cmID;
        $cmDetail->Title = $request->baslik;
        $cmDetail->UserID = $request->userID;
        $cmDetail->ResponsibleUserID = $request->sorumlu;
        $cmDetail->Description = $request->aciklama;
        $cmDetail->TypeID = $request->tip;
        $cmDetail->SystemID = $request->sistem;
        $cmDetail->SubSystemID = $request->altSistem;
        $cmDetail->LevelID = $request->onemDerecesi;
        $cmDetail->PrecedenceID = $request->oncelik;
        $cmDetail->StatID = 1;
        $cmDetail->save();

        if ($request->hasFile('image')) {
        
            $files = $request->file('image');
        
            foreach($files as $file){
                
                $filename = $file->getClientOriginalName();
                $extension = $file->getClientOriginalExtension();
                $fileName = str_random(5)."-".date('his')."-".str_random(3).".".$extension;
                $destinationPath = 'cmFiles/';
                $file->move($destinationPath, $fileName);

                $cmDetailAdditional = new CmDetailAdditional;
                $cmDetailAdditional->CmDetailID = $cmDetail->id;
                $cmDetailAdditional->FileName = $fileName;
                $cmDetailAdditional->save();
            }
        }

        //
        $Cmdata = array('ResponsibleUserID' => $request->sorumlu,'StatID' => $request->durum);

        Cm::whereId($request->cmID)->update($Cmdata);
        //

        $cm = Cm::find($request->cmID);

        if(isset($cm->Mail))
        $emails = explode(",",$cm->Mail);

        array_push($emails,User::find($cm->UserID)->email);
        
        array_push($emails,User::find($cm->ResponsibleUserID)->email);
        
        $details = [
            'title' => $cm->Title,
            'description' => $cmDetail->Description,
            'no' => $request->cmID
        ];

        Mail::to(array_unique($emails))->send(new SendMail($details));

        return redirect()->route('cms.show',$request->cmID);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //$id;
        //$cm = Cm::find(1);
        //$cmDetail = CmDetail::where('CmID',1);
        //dd($cmDetail->cm);
        //dd($cm->cmDetails()->get());
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

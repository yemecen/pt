<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Precedence;

class PrecedenceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $precedences = Precedence::all();

        return view('precedence.index',compact('precedences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('precedence.create');
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

        Precedence::create($request->all());

        return redirect()->route('precedences.index'); 
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
    public function edit(Precedence $precedence)
    {
        return view('precedence.edit',compact('precedence'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Precedence $precedence)
    {
        $request->validate([
            'Name' => 'required',
        ]);

        $precedence->update($request->all());

        return redirect()->route('precedences.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Precedence $precedence)
    {
        $precedence->delete();

        return redirect()->route('precedences.index');
    }
}

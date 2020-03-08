<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();

        return view('user.index',compact('users'));
    }

    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateAllUser(Request $request)
    {
        //input check
        $users = $request->all();
        //all user
        $usersIsUnChecked = array_column(User::all()->toArray(),'id');
        
        foreach ($users['is_admin'] as $key => $user) {
            //checked update 
            User::find($user)->update(array('is_admin' => 1));
            //checked remobe,unchecked list
            unset($usersIsUnChecked[array_search($user,$usersIsUnChecked)]);  
        }

        foreach ($usersIsUnChecked as $key => $user) {
            User::find($user)->update(array('is_admin' => 0));            
        }

        return redirect()->route('users.index'); 
    }

}

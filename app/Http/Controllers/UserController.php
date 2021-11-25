<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;



class UserController extends Controller
{
    public function index(){

        $users = User::paginate(5);

       return view('users.index',['users'=> $users]);
    }
    public function store(Request $request){

       $users= User::create($request->all());
       if($users){
           return redirect()->back()->with('user created sucessfully');
       }
       return redirect()->back()->with('user cannot be created');
    }
    
    public function update(Request $request, $id)
    {
        $users = User::find($id);
        if(!$users){
            return back()->with('Error','User cannot be found');
        }
        $users->update($request->all());
        return back()->with('user is updated successfully');

    }
    public function destroy( $id)
    {
        $users = User::find($id);
        if(!$users){
            return back()->with('Error','User cannot be found');
        }
        $users->delete();
        return back()->with('user is deleted successfully');

    }
}

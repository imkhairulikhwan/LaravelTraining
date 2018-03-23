<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['web','auth']);
    }

    public function index()
    {
        // $users = User::all(); //retrieve data from database using eloquent
        $users = User::paginate(10); //retrieve data from database using eloquent
        return view('users.index', compact('users')); //pass variable to view
            // return view('users.index', ['pengguna' => $users]]);
            // return view('users.index')->with('penggunaasss', $users);    
    }    

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user')); 
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', compact('user')); 
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|min:3|max:255'
        ]);

        User::where('id', $id)->update([
            'name' => $request->input('name')
        ]);

        return redirect()->route('users.show', $id);
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {
        //validate inputs
        $this->validate($request, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
        
        //create a user based on the inputs
        \App\User::create($request->only('name','email','password'));

        //sweet alert
        swal()
            ->autoclose(3000)
            ->success('New User', 'User successfully created!');

        return redirect()->route('static.users');
    }

    public function destroy($id)
    {
        //DELETE FROM users WHERE id = ?
        User::where('id', $id)->delete();
        
        return redirect()->route('static.users');
    }

}

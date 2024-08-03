<?php

namespace App\Http\Controllers;

use App\Models\RoleModel;
use App\Models\User;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $data['getRecord'] = User::getRecord();
        
        return view('user/user', $data);
    }
    public function add()
    {
        $data['getRole'] = RoleModel::getRecord();
        return view('user/add', $data);
    }

    public function edit($id)
    {
       
        $data['getRecord'] = User::getSingle($id);
        $data['getRole'] = RoleModel::getRecord();
        
        return view('user/edit', $data);
    }
    public function insert( Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:8',
            
        ]);
        $user = new User;
        $user -> name = trim($request->name);
        $user -> email = trim($request->email);
        $user -> password = Hash::make($request->password);
        $user ->role_id = trim($request->role_id);
        $user->save();

        return redirect('user/user')->with('success', "User successfully created");
    }
   
    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
   
            
        ]);

       
        $user = User::getSingle($id);
        $user -> name = trim($request->name);
       if(!empty($request->password))
       {
        $user -> password = Hash::make($request->password);
       }
       
        $user ->role_id = trim($request->role_id);
        $user->save();

        return redirect('user/user')->with('success', "User successfully updated");
    }
    
    public function deleted($id)
    {
       
        $user = User::getSingle($id);
        $user -> delete();
       

        return redirect('user/user')->with('success', "User successfully deleted");
    }
}

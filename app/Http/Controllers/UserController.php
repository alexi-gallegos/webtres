<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\EditUserRequest;

class UserController extends Controller
{
    
    public function index(){
        $users = new User;
        $users = $users->get_users();
        
        return view('index', [ 'users' => $users ]);
    }

    public function create(){
        return view('users.create');
    }

    public function edit(Request $request){
        $user = new User;
        $usuario = $user->get_user($request->id);
        return view('users.edit', [ 'user' => $usuario ]);

    }

    public function update(EditUserRequest $request){
        $user = new User;
        $user_to_update = $user->get_user($request->id);
        $user_to_update->update_user($request);
        $user_to_update->save();

        return redirect()->route('users_inicio')->with('success', 'Usuario actualizado.');   
    }

    public function delete(Request $request){
        $user = new User;
        $usuario_to_delete = $user->get_user($request->id);
        $usuario_to_delete->delete();
        return redirect()->route('users_inicio')->with('success', 'Usuario eliminado.');
    }
}

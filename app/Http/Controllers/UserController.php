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
        return $request;
    }
}

<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserStoreRequest;

class UserAPIController extends Controller
{
    
    public function get_users(){
        $users = new User;
        $users = $users->get_users();

        return response()->json($users);
    }

    public function store(UserStoreRequest $request){
        $user = new User;
        $user->store($request);
        $user->save();

        return response()->json([
                                                                'ok' => true,
                                                                'message' => 'usuario creado',
        ], 201);
    }

}

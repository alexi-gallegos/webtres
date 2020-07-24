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

    public function change_photo(Request $request){
        $user = new User;
        $usuario = $user->get_user($request->id);
        $nombre_nueva_imagen = $usuario->change_photo($request);
        
        if($nombre_nueva_imagen == null){
                    return response()->json([
                        'ok' => false,
                        'message' => 'No se pudo actualizar la imagen.'
                    ], 422);
        }
        $usuario->delete_photo($usuario->imagen);
        $usuario->imagen = $nombre_nueva_imagen;
        $usuario->save();

        return response()->json([
                         'ok' => true, 
                        'message' => 'Imagen actualizada con éxito.'
                    ]);

        
    }

}

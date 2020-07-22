<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    
    public function index(){
        $users = new User;
        $users = $users->get_users();
        
        return view('index', [ 'users' => $users ]);
    }

}

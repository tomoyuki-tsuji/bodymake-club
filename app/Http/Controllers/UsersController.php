<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Micropost;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'desc')->paginate(10);
        
        return view('users.index', [
            'users' => $users
        ]);
    }
    
    public function show($id)
    {
        $user = User::find($id);
        $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
        
        $data = [
            'user' => $user,
            'microposts' => $microposts,
        ];
        
        $data += $this->counts($user);
        
        return view('users.show', $data);
    }
    
    public function favorites($id)
    {
        $user = User::find($id);
        $favorites = $user->favorites()->paginate(10);
        
        $data = [
            'user'=>$user,
            'favorites'=>$favorites,
        ];
        
        $data += $this->counts($user);
        
        return view('users.favorites', $data);
    }
    
    
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        
        \Auth::logout();
        return view('welcome', [
            'user'=>$user,
        ]);
    }
    
}

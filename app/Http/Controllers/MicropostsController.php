<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Micropost;
use App\User;

class MicropostsController extends Controller
{
    public function index1()
    {
        $data = [];
        if(\Auth::check()){
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        
        return view('welcome', $data);
    }
    
    public function index2()
    {
        $data = [];
        if(\Auth::check()){
            $user = \Auth::user();
            $microposts = $user->microposts()->orderBy('created_at', 'desc')->paginate(10);
            
            $data = [
                'user' => $user,
                'microposts' => $microposts,
            ];
        }
        
        return view('overview', $data);
    }
    
    public function create()
    {
        $user = \Auth::user();
        $micropost = new Micropost;
        
        return view('microposts.create', [
            'micropost' => $micropost, 
            'user' => $user,
        ]);
    }
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:191',
            'picture' => 'required',
        ]);
        
        $micropost = new Micropost;
        $user = \Auth::user();
        $micropost->user_id = $user->id;
        $micropost->content = $request->content;
        $micropost->picture = $request->file('picture')->store('public/picture_folder');
        $micropost->save();
        
        return redirect('/');
    }
    
    public function destroy($id)
    {
        $micropost = Micropost::find($id);
        
        if(\Auth::id() === $micropost->user_id){
            $micropost->delete();
        }
        
        return back();
    }
}

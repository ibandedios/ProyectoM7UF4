<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;

class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index(Request $request)
    {
        $users = User::all();
        //find para buscar 1 id
        //return view('postsuser')->with('users', $users);
        return view('profile')->with('users', $users);
    }

    public function create()
    {
        
        return view('createposts');
    }

    public function edit($id)
    {
        
        $user = User::find($id);
        
        return view('editprofile')->with('user', $user);
    }

    public function update(Request $request, $id)
    {
        
        $user = User::find($id);

        $user ->username=$request->get('username');
        $user ->email=$request->get('email');

        $user->save();

        $user = User::find($id);
        
        return view('editprofile')->with('user', $user);
    }

    public function destroy($id)
    {
        
        //borrar posts del usuario
        
        $posts = Post::all();

        foreach ($posts as $post){
        
            if($post->user_id == $id){
                $post->delete();
            }

        }
        

        //borrar usuario

        $user = User::find($id);

        
        $user->delete();

        return redirect('home');

    }
}

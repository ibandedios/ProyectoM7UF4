<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;


//controlador de perfil
class ProfileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        //$this->authorizeResource(User::class);
    }
    public function index(Request $request)
    {
        $users = User::all();
        //find para buscar 1 id
        //return view('postsuser')->with('users', $users);
        return view('profile')->with('users', $users);
    }

    //muestra la vista de crear posts
    public function create()
    {
        
        return view('createposts');
    }
    //muestra la vista de editar el perfil
    public function edit($id)
    {

        $user = User::find($id);

        $userid = $user->id;

        $this->authorize('edit-user', $userid);
        
        return view('editprofile')->with('user', $user);
    }

    //update para actualizar los datos del perfil
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
